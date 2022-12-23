<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaksis = json_decode(File::get('public/dummy-data/transactions.json'));
        foreach ($transaksis as $transaksi) {
            Transaksi::create([
                'produks_id' => $transaksi->produks_id,
                'jumlah_produk' => $transaksi->jumlah_produk,
                'tgl_transaksi' => $transaksi->tgl_transaksi
            ]);
        }
    }
}
