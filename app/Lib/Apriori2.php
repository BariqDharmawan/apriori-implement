<?php

namespace App\Lib;

use Illuminate\Support\Collection;

class Apriori2 {
    public float $minConf;
    public int $minSuppCount, $dataCount, $index;
    public array $data, $table, $rules, $filtredRules;


    public function __construct(int $minSuppCount, float $minConf)
    {
        $this->minConf = $minConf;
        $this->minSuppCount = $minSuppCount;
    }

    public function importData(Collection $data) {
        
        $data = $data->filter(function ($val, $key) {
            return $val->count() > 1;
        });
        // dd($data);

        $temp = array();

        foreach ($data as $value) {
            $temp[] = $value->pluck("produks_id")->toArray();
        }
        $this->data = $temp;
        $this->dataCount = count($data); 
        $this->table = array();
    }


    public function iterate()
    {
        $itemIds = array_unique(array_merge(...$this->data));
        $iteration = $itemIds;
        $this->index = 1;
        while (true) {
            $frequentItems =  array();
            foreach ($iteration as $val) {
                if (is_array($val)) {
                    $frequentItems[implode("-", $val)] = $this->calcFreqItems($val);
                } else {
                    $frequentItems["$val"] = $this->calcFreqItems($val);
                }
            }
            
            // dump($frequentItems);
            // filter frequentItems with minSuppCount
            $frequentItems = array_filter($frequentItems, function ($v) {
                return $v >= $this->minSuppCount;
            });
            // dump("filtered",$frequentItems);

            // insert frequentItems to table
            if (count($frequentItems) == 0) {
                break;
            }
            $this->table[] = $frequentItems;

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
        // dd($this->table);
    }

    public function calcFreqItems(int | array $val) : int {
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

    public function findSupport($arr) : int
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
            for ($i=1; $i < $tableCount; $i++) { 
                $itemset = explode('-',$item);
                foreach (new Combinations($itemset, $i) as $arr) {
                    $then = array_diff($itemset, $arr);

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
    }



}