<?php

namespace App\Lib;

use Illuminate\Support\Collection;
use Iterator;

$iteration = [
    [
        [
            "itemIds" => [1],
            "supportCount" => 2
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
        "confident" => 1 // 2/2
    ],
    [
        "itemIds" => [2, 3],
        "confident" => 1 // 3/3
    ],
    [
        "itemIds" => [1, 3],
        "confident" => 0.5 // 1/2
    ],
    [
        "itemIds" => [1, 2, 3],
        "confident" => 1 // 2/2
    ],
];

class Apriori
{
    private int $minSupport, $minConfidence;
    private int $index = 0;
    private Collection $data, $iteration, $rules;

    public function __construct(int $minSupport, int $minConfidence)
    {
        $this->minSupport = $minSupport;
        $this->minConfidence = $minConfidence;
        $this->iteration = collect();
        $this->rules = collect();
    }

    public function importData($data)
    {
        $this->data = $data;
    }

    public function iterate()
    {
        $itemIdSet = collect();

        while (true) {
            $iterationItem = collect();
            if (count($this->iteration) == 0) {


                foreach ($this->data as $trx) {
                    $itemIdSet = $itemIdSet->merge($trx->pluck("produks_id"));
                }

                $flattenData = $this->data->flatten();
                $itemIdSet = $itemIdSet->unique()->values();

                $itemIdSet->each(function ($item) use ($iterationItem, $flattenData) {
                    $iterationItem->push(
                        [
                            "idSet" => $item,
                            "supportCount" => $flattenData->where("produks_id", $item)->count()
                        ]
                    );
                });

                $iterationItem->where("supportCount", ">=", $this->minSupport);
                $this->iteration->push($iterationItem);
            } else {
            }
            dump($itemIdSet);
            $z = collect($this->getCombination($itemIdSet, 2));
            foreach ($z as $k => $y) {
                if (count(array_unique((array) $y)) != 2) {
                    $z->forget($k);
                }
            }
            dd($z);

            $this->index++;
        }
    }

    public function getCombination($items, int $size, $combinations = array())
    {
        # in case of first iteration, the first set of combinations is the same as the set of characters
        if (empty($combinations)) {
            $combinations = $items;
        }
        # size 1 indicates we are done
        if ($size == 1) {
            return $combinations;
        }
        # initialise array to put new values into it
        $new_combinations = array();
        # loop through the existing combinations and character set to create strings
        foreach ($combinations as $combination) {
            foreach ($items as $char) {
                $temp = array();
                if (gettype($combination) == "integer") {
                    array_push($temp, $combination);
                } else {
                    array_push($temp, ...$combination);
                }
                array_push($temp, $char);
                sort($temp);
                $new_combinations[] = $temp;
            }
        }
        # call the same function again for the next iteration as well
        return $this->getCombination($items, $size - 1, $new_combinations);
    }
}