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
                'gambar' => 'https://cdn.pixabay.com/photo/2014/02/01/17/30/apple-256268_960_720.jpg',
                'nama_produk' => $produk->nama_produk,
                'harga' => $produk->harga
            ]);
        }
    }
}
