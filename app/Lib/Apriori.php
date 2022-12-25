<?php

namespace App\Lib;

use Illuminate\Support\Collection;
use PhpParser\Node\Expr\Cast\Double;

$iteration = [
    [
        [
            "itemIds" => [1],
            "supportCount" => 2,
            "support" => 0.4
        ],
        [
            "itemIds" => [2],
            "supportCount" => 3
        ],
        [
            "itemIds" => [3],
            "supportCount" => 2
        ],
    ],
    [
        [
            "itemIds" => [1, 2],
            "supportCount" => 2
        ],
        [
            "itemIds" => [2, 3],
            "supportCount" => 3
        ],
        [
            "itemIds" => [1, 3],
            "supportCount" => 1
        ],
    ],
    [
        [
            "itemIds" => [1, 2, 3],
            "supportCount" => 2
        ],
    ],
];

$rules = [
    [
        "itemIds" => [1, 2],
        "if" => [1],
        "then" => [2],
        "confident" => 1 // 2/2
    ],
    [
        "itemIds" => [2, 3],
        "if" => [2],
        "then" => [3],
        "confident" => 1 // 3/3
    ],
    [
        "itemIds" => [1, 3],
        "if" => [1],
        "then" => [3],
        "confident" => 0.5 // 1/2
    ],
    [
        "itemIds" => [1, 2, 3],
        "if" => [1, 2],
        "then" => [3],
        "confident" => 1 // 2/2
    ],
];

class Apriori
{
    private int $minSupport, $dataCount;
    private float $minConfidence;
    private int $index = 0;
    private Collection $data, $iteration, $rules;

    public function __construct(int $minSupport, float $minConfidence)
    {
        $this->minSupport = $minSupport;
        $this->minConfidence = $minConfidence;
        $this->iteration = collect();
        $this->rules = collect();
    }

    public function importData($data)
    {
        $this->data = $data;
        $this->dataCount = $data->count();
    }

    public function iterate()
    {
        $itemIdSet = collect();

        while (true) {
            $iterationItem = collect();
            if ($this->iteration->count() == 0) {
                foreach ($this->data as $trx) {
                    $itemIdSet = $itemIdSet->merge($trx->pluck("produks_id"));
                }

                $flattenData = $this->data->flatten();
                $itemIdSet = $itemIdSet->unique()->values();

                $itemIdSet->each(function ($item) use ($iterationItem, $flattenData) {
                    $temp = [
                        "idSet" => $item,
                        "supportCount" => $flattenData->where("produks_id", $item)->count()
                    ];

                    $temp["support"] = round($temp["supportCount"] / $this->dataCount, 2);
                    $iterationItem->push($temp);
                });
            } else {
                // count support
                foreach ($itemIdSet as $value) {
                    $temp = [
                        "idSet" => $value,
                        "supportCount" => 0
                    ];
                    foreach ($this->data as $item) {
                        $boolTemp = true;
                        $y = $item->pluck("produks_id")->all();

                        foreach ($value as $x) {
                            $boolTemp = $boolTemp && in_array($x, $y);
                        }

                        if ($boolTemp) {
                            $temp["supportCount"]++;
                        }
                    }
                    $temp["support"] = round($temp["supportCount"] / $this->dataCount, 2);
                    $iterationItem->push($temp);
                }
            }
            $iterationItem = $iterationItem->where("supportCount", ">=", $this->minSupport);

            $this->iteration->push($iterationItem);

            // set new itemset based on prev iteration
            $itemIdSet = $iterationItem->pluck("idSet")->flatten()->unique()->all();

            // dd($itemIdSet);

            if ($this->index + 1 == count($itemIdSet)) {
                break;
            }

            $x = collect();
            foreach (new Combinations($itemIdSet, $this->index + 2) as $arr) {
                $x->push($arr);
            }
            $itemIdSet = $x;
            $this->index++;
        }
    }

    public function generateRules(): Collection
    {
        $item = $this->iteration;
        $item = $item->last()->pluck("idSet")->flatten()->unique();

        for ($i = 2; $i <= count($item); $i++) {
            foreach (new Combinations($item, $i) as $set) {
                $setCount = count($set);
                $rule = collect([
                    "itemIds" => $set,
                    "if" => array_slice($set, 0, $setCount - 1),
                    "then" => array_slice($set, -1, 1),
                ]);

                $foundSet = $this->findInIteration($set);
                if (count($foundSet) == 0) {
                    continue;
                }
                $foundIf = $this->findInIteration((array) $rule["if"]);
                if (count($foundIf) == 0) {
                    continue;
                }

                $rule["confidence"] = round($foundSet["supportCount"] / $foundIf["supportCount"], 2);

                $this->rules->push($rule);
            }
        }

        return $this->rules->where("confidence", ">=", $this->minConfidence);
    }

    public function findInIteration(array $needle): array
    {
        $needleCount = count($needle);

        foreach ($this->iteration[$needleCount - 1] as $item) {
            if (count(array_diff((array) $item["idSet"], $needle)) == 0) {
                return $item;
            }
        }

        return array();
    }
}
