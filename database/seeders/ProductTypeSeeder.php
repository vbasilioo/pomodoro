<?php

namespace Database\Seeders;

use App\Models\Marketplace\Type;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            'name' => 'Electronics',
            'description' => 'Devices and gadgets',
        ]);
    }
}
