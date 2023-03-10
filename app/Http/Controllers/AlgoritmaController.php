<?php

namespace App\Http\Controllers;

use App\Lib\Apriori;
use App\Models\Produk;
use App\Models\StaticVar;
use App\Models\TransaksiItem;

class AlgoritmaController extends Controller
{
    public function apriori()
    {
        $staticVar = StaticVar::first();

        $apriori = new Apriori($staticVar->min_support, StaticVar::first()->min_confidence);
        $apriori->importData(TransaksiItem::get()->groupBy("transaksis_id"));
        $apriori->iterate();

        $apriori->generateRules();

        $produk = Produk::whereIn('id', $apriori->getOutput()['productIds'])->get();

        return view('algoritma.apriori', ['stepByStep' => $apriori->getOutput(), 'produk' => $produk]);
    }
}
