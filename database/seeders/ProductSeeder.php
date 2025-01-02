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
                'price' => 199,
                'context' => '{"eyes": "mad"}',
            ],
            [
                'product_type_id' => ProductTypeEnum::Face,
                'name' => 'Kind Eyes',
                'price' => 200,
                'context' => '{"eyes": "kind"}',
            ],
            [
                'product_type_id' => ProductTypeEnum::Background,
                'name' => 'Neon Background',
                'price' => 200,
                'context' => 'blue-background',
            ],
        ];

        foreach ($products as $product) {
            Product::query()->firstOrCreate($product);
        }
    }
}
