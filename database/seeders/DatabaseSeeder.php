<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            WalletSeeder::class,
            TransactionSeeder::class,
            TransactionLedgerSeeder::class,
            PermissionSeeder::class,
            PomodoroSessionSeeder::class,
            ProductTypeSeeder::class,
            ProductSeeder::class,
            UserProductSeeder::class,
        ]);
    }
}
