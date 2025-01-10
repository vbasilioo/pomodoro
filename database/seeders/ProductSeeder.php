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
                'product_type_id' => ProductTypeEnum::Background,
                'name' => 'Blue Background',
                'price' => 1200,
                'context' => 'primaryBlue',
            ],
            [
                'product_type_id' => ProductTypeEnum::Background,
                'name' => 'Purple Background',
                'price' => 1200,
                'context' => 'primaryPurple',
            ],
            [
                'product_type_id' => ProductTypeEnum::Background,
                'name' => 'Green Background',
                'price' => 1200,
                'context' => 'primaryGreen',
            ],
            [
                'product_type_id' => ProductTypeEnum::Background,
                'name' => 'Orange Background',
                'price' => 1200,
                'context' => 'primaryOrange',
            ],
            [
                'product_type_id' => ProductTypeEnum::Background,
                'name' => 'Yellow Background',
                'price' => 1200,
                'context' => 'primaryYellow',
            ],
            [
                'product_type_id' => ProductTypeEnum::Background,
                'name' => 'Pink Background',
                'price' => 1200,
                'context' => 'primaryPink',
            ],
            [
                'product_type_id' => ProductTypeEnum::Background,
                'name' => 'First Default Background',
                'price' => 1200,
                'context' => 'primaryDefault',
            ],
            [
                'product_type_id' => ProductTypeEnum::Background,
                'name' => 'Second Default Background',
                'price' => 1200,
                'context' => 'primaryDefault',
            ],
            [
                'product_type_id' => ProductTypeEnum::Background,
                'name' => 'Third Default Background',
                'price' => 1200,
                'context' => 'primaryDefault',
            ],
            [
                'product_type_id' => ProductTypeEnum::Background,
                'name' => 'Fourth Default Background',
                'price' => 1200,
                'context' => 'primaryDefault',
            ],
        ];

        foreach ($products as $product) {
            Product::query()->firstOrCreate($product);
        }
    }
}
