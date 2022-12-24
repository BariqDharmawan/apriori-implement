<?php

namespace Database\Seeders;

use App\Models\TransaksiItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TransaksiItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produks = json_decode(File::get('public/dummy-data/transaksi-item.json'));
        foreach ($produks as $produk) {
            TransaksiItem::create([
                'produks_id' => $produk->produks_id,
                'transaksis_id' => $produk->transaksis_id
            ]);
        }
    }
}
