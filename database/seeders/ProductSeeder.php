<?php

namespace Database\Seeders;

use App\Models\Marketplace\Product;
use App\Models\Marketplace\Type;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productType = Type::first();

        $productType ?
            Product::create([
                'product_type_id' => $productType->id,
                'price' => 99.99,
            ])
        :
            throw new \Exception('No product type found.');
    }
}
