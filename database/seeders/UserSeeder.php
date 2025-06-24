<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // Puedes cambiar la clave si quieres
            'role' => 'admin',
        ]);

        // Regular user
        User::create([
            'name' => 'Usuario',
            'email' => 'usuario@example.com',
            'password' => Hash::make('user123'),
            'role' => 'user',
        ]);
    }
}
