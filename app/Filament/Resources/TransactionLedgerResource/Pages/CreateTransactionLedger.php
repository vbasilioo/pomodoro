<?php

namespace App\Filament\Resources\TransactionLedgerResource\Pages;

use App\Filament\Resources\TransactionLedgerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTransactionLedger extends CreateRecord
{
    protected static string $resource = TransactionLedgerResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Transaction Ledger created successfully.';
    }
}
