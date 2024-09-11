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
        Product::create([
            'name' => 'やなサイダー',
            'price' => '150',
            'product_image' => 'default.JPG',
        ]);
        Product::create([
            'name' => 'やなぱん',
            'price' => '150',
            'product_image' => 'default.JPG',
        ]);
        Product::create([
            'name' => 'やなそうめん',
            'price' => '150',
            'product_image' => 'default.JPG',
        ]);
        Product::create([
            'name' => 'やなつけめん',
            'price' => '150',
            'product_image' => 'default.JPG',
        ]);
    }
}
