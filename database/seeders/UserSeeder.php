<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password'), // Ganti dengan yang kuat
            'role'     => 'admin',
        ]);

        // User biasa
        User::create([
            'name'     => 'User Biasa',
            'email'    => 'user@example.com',
            'password' => Hash::make('password'), // Ganti juga kalau perlu
            'role'     => 'user',
        ]);
    }
}
