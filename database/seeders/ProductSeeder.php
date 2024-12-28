<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productType = ProductType::first();

        $productType ? 
            Product::create([
                'product_type_id' => $productType->id,
                'price' => 99.99,
            ])
        :
            throw new \Exception('No product type found.');
    }
}
