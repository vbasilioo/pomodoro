<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\TransactionLedger;
use App\Models\User;
use Illuminate\Database\Seeder;

class TransactionLedgerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transaction = Transaction::first();
        $users = User::all();

        if($transaction)
            foreach($users as $user)
                TransactionLedger::create([
                    'transaction_id' => $transaction->id,
                    'user_id' => $user->id,
                    'type' => 'credit',
                    'amount' => 25.00,
                ]);
        else
            throw new \Exception('No transaction found to link with TransactionLedger');
    }
}
