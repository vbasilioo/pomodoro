<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
        ]);

        $user = User::factory()->create([
            'name' => 'Vinícius',
            'email' => 'vinicius@mail.com',
        ]);

        $adminRole = Role::create(['name' => 'Admin']);

        $userRole = Role::create(['name' => 'Bank']);

        $admin->assignRole($adminRole);

        $user->assignRole($userRole);
    }
}
