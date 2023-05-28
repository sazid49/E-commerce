<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::query()->insert([
             [
                 'name' => 'admin',
                 'email' => 'admin@gmail.com',
                 'is_admin' => 1,
                 'password' => Hash::make(12345678),
             ],
             [
                 'name' => 'user',
                 'email' => 'user@gmail.com',
                 'is_admin' =>0,
                 'password' => Hash::make(12345678),
             ],
         ]);
    }
}
