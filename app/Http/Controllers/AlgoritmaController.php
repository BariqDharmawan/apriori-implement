<?php

namespace App\Http\Controllers;

use App\Lib\Apriori;
use App\Models\Produk;
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

        $apriories = $apriori->generateRules();

        $listProdukName = [];
        foreach ($apriories as $apriory) {
            $listProdukName[] = Produk::whereIn('id', $apriory['if'])->get();
        }

        $modApriories = $apriories->map(function ($item, $key) {
            return [
                'if' => Produk::whereIn('id', $item['if'])->get(),
                'then' => Produk::whereIn('id', $item['then'])->get(),
                'confidence' => $item['confidence'] * 100 . '%',
            ];
        });

        dd($modApriories);

        return view('algoritma.apriori', ['apriories' => $modApriories]);
    }
}
