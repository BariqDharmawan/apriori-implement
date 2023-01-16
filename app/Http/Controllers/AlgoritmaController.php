<?php

namespace App\Http\Controllers;

use App\Lib\Apriori;
use App\Models\Produk;
use App\Models\TransaksiItem;

class AlgoritmaController extends Controller
{
    public function apriori()
    {
        $apriori = new Apriori(1, 0);
        $apriori->importData(TransaksiItem::get()->groupBy("transaksis_id"));
        $apriori->iterate();

        $apriori->generateRules();

        $modApriories = array_map(function ($item) {
            return [
                'if' => Produk::whereIn('id', $item['if'])->get(),
                'then' => Produk::whereIn('id', $item['then'])->get(),
                'confidence' => $item['confidence'] * 100 . '%',
            ];
        }, $apriori->filtredRules);

        return view('algoritma.apriori', ['apriories' => $modApriories]);
    }
}
