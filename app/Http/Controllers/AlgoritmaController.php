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
        $apriori = new Apriori(4, 50);
        $apriori->importData(TransaksiItem::get()->groupBy("transaksis_id"));
        $apriori->iterate();
        dd("ok");
        return view('algoritma.apriori');
    }
}
