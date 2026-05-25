<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat akun supervisor spesifik
        User::factory()->create([
            'no_induk' => '0000000001',
            'name' => 'supervisor',
            'email' => 'supervisor@lab.com',
            'password' => Hash::make('supervisor'), // Menggunakan Hash::make demi standar Laravel
            'role' => 'supervisor'
        ]);

        // Opsional: Jika kedepannya ingin menambah 10 user random, tinggal lepas comment di bawah ini:
        // User::factory(10)->create();
    }
}
