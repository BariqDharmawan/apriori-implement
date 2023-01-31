<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(8)->create();
        User::insert([
            [
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'nama' => 'Admin',
                'role' => 'admin',
                'password' => Hash::make('password')
            ],
            [
                'username' => 'user',
                'email' => 'user@user.com',
                'nama' => 'User 1',
                'role' => 'user',
                'password' => Hash::make('password')
            ]
        ]);

        $this->call([
            ProdukSeeder::class,
            TransaksiSeeder::class,
            TransaksiItemSeeder::class,
            CartSeeder::class,
            StaticVarSeeder::class
        ]);
    }
}
