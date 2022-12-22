<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(9)->create();
        User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'nama' => 'Admin',
            'role' => 'admin'
        ]);
    }
}
