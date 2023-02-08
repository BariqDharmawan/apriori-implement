<?php

namespace Database\Seeders;

use App\Models\StaticVar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaticVarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StaticVar::create([
            'min_confidence' => 0.1,
            'min_support' => 1
        ]);
    }
}
