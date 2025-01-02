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
        $productTypes = [
            [
                'name' => 'Eyes',
                'description' => 'Types of eyes to your friend',
            ],
            [
                'name' => 'Backgrounds',
                'description' => 'Background colours to enhance your pomodoro session.',
            ],
        ];

        foreach ($productTypes as $productType) {
            Type::query()->firstOrCreate($productType);
        }
    }
}
