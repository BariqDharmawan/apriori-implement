<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransaksiItem>
 */
class TransaksiItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'jumlah_produk' => mt_rand(1, 20),
            'produks_id' => mt_rand(1, 13),
            'transaksis_id' => mt_rand(1, 100)
        ];
    }
}
