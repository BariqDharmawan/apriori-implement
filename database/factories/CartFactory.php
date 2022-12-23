<?php

namespace Database\Factories;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => User::where('role', '!=', 'admin')->inRandomOrder()->get()->pluck('id')->first(),
            'produks_id' => Produk::inRandomOrder()->get()->pluck('id')->first(),
            'qty' => rand(1, 10)
        ];
    }
}
