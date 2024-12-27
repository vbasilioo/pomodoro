<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'Admin']);

        $admin = User::where('email', 'admin@mail.com')->first();

        if($admin){
            $admin->assignRole($adminRole);

            UserRole::create([
                'user_id' => $admin->id,
                'role_id' => $adminRole->id,
                'granted_at' => Carbon::now(),
            ]);
        }
    }
}
