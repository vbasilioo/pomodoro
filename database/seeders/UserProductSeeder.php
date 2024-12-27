<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\UserProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $product = Product::first();

        UserProduct::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'bought_at' => now(),
        ]);
    }
}
