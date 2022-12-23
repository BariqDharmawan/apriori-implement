<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produks = json_decode(File::get('public/dummy-data/products.json'));
        foreach ($produks as $produk) {
            Produk::create([
                'gambar' => $produk->gambar,
                'nama_produk' => $produk->nama_produk,
                'harga' => $produk->harga
            ]);
        }
    }
}
