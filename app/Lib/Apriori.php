<?php

namespace App\Lib;

use Illuminate\Support\Collection;

class Apriori
{
    private float $minConf;
    private int $minSuppCount, $dataCount, $index;
    public array $data, $table, $rules, $filtredRules, $output;


    public function __construct(int $minSuppCount, float $minConf)
    {
        $this->minConf = $minConf;
        $this->minSuppCount = $minSuppCount;
        $this->rules = [];
        $this->output = [
            "minConfidence" => $this->minConf,
            "minSupportCount" => $this->minSuppCount,
        ];
    }

    public function importData(Collection $data)
    {

        $data = $data->filter(function ($val, $key) {
            return $val->count() > 1;
        });

        $temp = array();

        foreach ($data as $value) {
            $temp[] = $value->pluck("produks_id")->toArray();
        }
        $this->data = $temp;
        $this->dataCount = count($data);
        $this->table = array();
        $this->output["transactions"] = $this->data;
        $this->output["transactionCount"] = $this->dataCount;
    }


    public function iterate()
    {
        $itemIds = array_unique(array_merge(...$this->data));
        $iteration = $itemIds;

        $this->output["productIds"] = $itemIds;
        $this->index = 1;

        // start iteration
        while (true) {
            $temp = array();
            $frequentItems =  array();
            
            foreach ($iteration as $val) {
                if (is_array($val)) {
                    $frequentItems[implode("-", $val)] = $this->calcFreqItems($val);
                } else {
                    $frequentItems["$val"] = $this->calcFreqItems($val);
                }
            }
            $temp["itemSet"] = $iteration;
            $temp["frequentItems"] = $frequentItems; 

            // filter frequentItems with minSuppCount
            $frequentItems = array_filter($frequentItems, function ($v) {
                return $v >= $this->minSuppCount;
            });

            $temp["filteredFrequentItems"] = $frequentItems;

            // insert frequentItems to table
            if (count($frequentItems) == 0) {
                break;
            }
            $this->table[] = $frequentItems;
            $this->output["iteration"][] = $temp;

            // update itemIds
            $itemIds = array();
            foreach (array_keys($frequentItems) as $k) {
                $itemIds =  array_merge($itemIds, array_map('intval', explode("-", $k)));
            }
            $itemIds = array_unique($itemIds);

            // check max combination
            if ($this->index == count($itemIds)) {
                break;
            }
            // generate new item ids using combination
            $iteration = array();
            foreach (new Combinations($itemIds, $this->index + 1) as $arr) {
                $iteration[] = $arr;
            }

            $this->index++;
        }
    }

    private function calcFreqItems(int | array $val): int
    {
        $count = 0;
        if (is_array($val)) {
            foreach ($this->data as $item) {
                if (array_intersect($item, $val) === $val) {
                    $count++;
                }
            }
        } else {
            foreach ($this->data as $item) {
                if (in_array($val, $item)) {
                    $count++;
                }
            }
        }

        return $count;
    }

    private function findSupport(array $arr): int
    {
        $key = implode('-', $arr);
        foreach ($this->table[count($arr) - 1] as $k => $v) {
            if ($k == $key) return $v;
        }
        return 0;
    }

    public function generateRules()
    {
        $tableCount = count($this->table);

        foreach ($this->table[$tableCount - 1] as $item  => $suppCount) {
            for ($i = 1; $i < $tableCount; $i++) {
                $itemset = explode('-', $item);
                foreach (iterator_to_array(new Combinations($itemset, $i),true) as $arr) {
                    $itemsetSupp = $suppCount;
                    $ifSupp = $this->findSupport($arr);

                    if ($ifSupp == 0) continue;

                    $this->rules[] = [
                        "itemIds" => $itemset,
                        "if" => $arr,
                        "then" => array_diff($itemset, $arr),
                        "confidence" => round($itemsetSupp / $ifSupp, 2)
                    ];
                }
            }
        }

        // filter confidence
        $this->filtredRules = array_filter($this->rules, function ($v) {
            return $v["confidence"] >= $this->minConf;
        });

        $this->output["rules"] = $this->rules;
        $this->output["filteredRules"] = $this->filtredRules;
    }

    public function getOutput() : array
    {
        return $this->output;
    }
}
