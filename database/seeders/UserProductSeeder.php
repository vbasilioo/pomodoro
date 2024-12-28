<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\UserProduct;
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

        $user && $product ?
            UserProduct::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'bought_at' => now(),
            ]) : 
            throw new \Exception('User or product not found.');
    }
}
