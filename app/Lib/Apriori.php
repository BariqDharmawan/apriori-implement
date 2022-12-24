<?php

namespace App\Lib;

use Illuminate\Support\Collection;

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
            "itemIds" => [1,2],
            "supportCount" => 2
        ],
        [
            "itemIds" => [2,3],
            "supportCount" => 3
        ],
        [
            "itemIds" => [1,3],
            "supportCount" => 1
        ],
    ],
    [
        [
            "itemIds" => [1,2,3],
            "supportCount" => 2
        ],
    ],
];

$rules = [
    [
        "itemIds" => [1,2],
        "confident" => 1 // 2/2
    ],
    [
        "itemIds" => [2,3],
        "confident" => 1 // 3/3
    ],
    [
        "itemIds" => [1,3],
        "confident" => 0.5 // 1/2
    ],
    [
        "itemIds" => [1,2,3],
        "confident" => 1 // 2/2
    ],
];

class Apriori {
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
        while (true) {
            $iterationItem = collect();
            if (count($this->iteration) == 0) {
            
                $itemIds = collect();

                foreach ($this->data as $trx) {
                    $itemIds = $itemIds->merge($trx->pluck("produks_id"));
                }

                $flattenData = $this->data->flatten();
                $itemIds = $itemIds->unique();
    
                $itemIds->each(function ($item) use ($iterationItem, $flattenData){
                    $iterationItem->push(
                        [
                            "itemIds" => $item,
                            "supportCount" => $flattenData->where("produks_id", $item)->count()
                        ]
                    );
                });
    
                $iterationItem->where("supportCount", ">=", $this->minSupport);
                $this->iteration->push($iterationItem);
            
            } else {



            }

            $this->index++;
        }
    }

}