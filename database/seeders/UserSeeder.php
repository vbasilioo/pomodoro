<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
            ],
            [
                'name' => 'Vinícius',
                'email' => 'vinicius@mail.com',
            ],
        ];

        foreach ($users as $userData) {
            User::query()->firstOrCreate($userData, [
                'password' => Hash::make('password'),
            ]);
        }
    }
}
