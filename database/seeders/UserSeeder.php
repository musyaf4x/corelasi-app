<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Admin (Sesuai nama kamu untuk identitas project)
        User::create([
            'nomor_induk' => '103022330077', // NIM kamu
            'name' => 'Gilang Tirta Kesumah',
            'email' => 'admin@corelasi.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Buat contoh Guru untuk testing tim
        User::create([
            'nomor_induk' => 'GURU001',
            'name' => 'Contoh Guru Corelasi',
            'email' => 'guru@corelasi.com',
            'password' => Hash::make('password123'),
            'role' => 'guru',
        ]);
    }
}