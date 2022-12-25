<?php

namespace App\Http\Controllers;

use App\Lib\Apriori;
use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Http\Request;

class AlgoritmaController extends Controller
{
    public function apriori()
    {
        // dd(TransaksiItem::get()->groupBy("transaksis_id")->first()->pluck("produks_id"));
        $apriori = new Apriori(2, 0.7);
        // dd(TransaksiItem::get()->groupBy("transaksis_id"));
        $apriori->importData(TransaksiItem::get()->groupBy("transaksis_id"));
        $apriori->iterate();
        dd($apriori->generateRules());
        return view('algoritma.apriori');
    }
}