<?php

namespace App\Http\Controllers;

use App\Lib\Apriori;
use App\Lib\Apriori2;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Http\Request;

class AlgoritmaController extends Controller
{
    public function apriori()
    {
        // dd(TransaksiItem::groupBy('transaksis_id')->having('count(1)', '>'));
        // dd(TransaksiItem::get()->groupBy("transaksis_id")->first()->pluck("produks_id"));
        $apriori = new Apriori2(2, 0.4);
        // dd(TransaksiItem::get()->groupBy("transaksis_id"));
        $apriori->importData(TransaksiItem::get()->groupBy("transaksis_id"));
        $apriori->iterate();

        $apriori->generateRules();

        // $listProdukName = [];
        // foreach ($apriori->filtredRules as $apriory) {
        //     $listProdukName[] = Produk::whereIn('id', $apriory['if'])->get();
        // }

        $modApriories = array_map(function ($item) {
            return [
                'if' => Produk::whereIn('id', $item['if'])->get(),
                'then' => Produk::whereIn('id', $item['then'])->get(),
                'confidence' => $item['confidence'] * 100 . '%',
            ];
        }, $apriori->filtredRules);

        // dd($modApriories);

        return view('algoritma.apriori', ['apriories' => $modApriories]);
    }
}
