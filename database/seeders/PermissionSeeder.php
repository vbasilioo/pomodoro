<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            /** Products */
            'view products',
            'create products',
            'edit products',
            'delete products',

            /** Permissions */
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',

            /** Roles */
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web',
            ]);
        }

        $productManagerRole = Role::create(['name' => 'Product Manager']);
        $productManagerRole->givePermissionTo([
            'view products',
            'create products',
            'edit products',
            'delete products',
        ]);

        $adminRole = Role::create(['name' => 'Admin']);
        $adminRole->givePermissionTo($permissions);

        $adminUser = User::find(1);
        if ($adminUser) {
            $adminUser->assignRole($adminRole);
        }

        $productManagerUser = User::find(2);
        if ($productManagerUser) {
            $productManagerUser->assignRole($productManagerRole);
        }
    }
}
