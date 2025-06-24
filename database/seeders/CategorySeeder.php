<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Electrónica',
            'description' => 'Dispositivos electrónicos y accesorios',
        ]);
        Category::create([
            'name' => 'Hogar',
            'description' => 'Productos para el hogar',
        ]);
        Category::create([
            'name' => 'Deportes',
            'description' => 'Artículos deportivos y fitness',
        ]);
    }
}
