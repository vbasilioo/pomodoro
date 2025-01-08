<?php

namespace Database\Seeders;

use App\Enums\ProductTypeEnum;
use App\Models\Marketplace\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'product_type_id' => ProductTypeEnum::Face,
                'name' => 'Mad eyes',
                'price' => 1200,
                'context' => 'primaryBlue',
            ],
            [
                'product_type_id' => ProductTypeEnum::Face,
                'name' => 'Kind Eyes',
                'price' => 1200,
                'context' => 'primaryPurple',
            ],
            [
                'product_type_id' => ProductTypeEnum::Background,
                'name' => 'Neon Background',
                'price' => 1200,
                'context' => 'primaryGreen',
            ],
        ];

        foreach ($products as $product) {
            Product::query()->firstOrCreate($product);
        }
    }
}
