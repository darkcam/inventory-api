<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Electrónica (id:1)
        Product::create([
            'category_id' => 1,
            'name' => 'Auriculares Bluetooth',
            'description' => 'Auriculares inalámbricos de alta calidad',
            'price' => 85.99,
            'stock' => 20,
        ]);
        // Electrónica (id:1)
        Product::create([
            'category_id' => 1,
            'name' => 'Auriculares Bluetooth',
            'description' => 'Auriculares inalámbricos de alta calidad',
            'price' => 85.99,
            'stock' => 20,
        ]);
        // Hogar (id:2)
        Product::create([
            'category_id' => 2,
            'name' => 'Cafetera Eléctrica',
            'description' => 'Cafetera programable para el hogar',
            'price' => 130.50,
            'stock' => 15,
        ]);
        // Deportes (id:3)
        Product::create([
            'category_id' => 3,
            'name' => 'Bicicleta Montañera',
            'description' => 'Bicicleta de montaña con suspensión',
            'price' => 950.00,
            'stock' => 5,
        ]);
        // Deportes (id:3)
        Product::create([
            'category_id' => 3,
            'name' => 'Bicicleta Montañera',
            'description' => 'Bicicleta de montaña con suspensión',
            'price' => 950.00,
            'stock' => 5,
        ]);
        
    }
}
