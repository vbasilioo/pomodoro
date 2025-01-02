<?php

namespace Database\Seeders;

use App\Models\User\User;
use App\Models\Wallet\Wallet;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            Wallet::create([
                'user_id' => $user->id,
                'balance' => 100.00,
            ]);
        }
    }
}
