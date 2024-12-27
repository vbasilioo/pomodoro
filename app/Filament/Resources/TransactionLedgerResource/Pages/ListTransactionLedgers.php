<?php

namespace App\Filament\Resources\TransactionLedgerResource\Pages;

use App\Filament\Resources\TransactionLedgerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTransactionLedgers extends ListRecords
{
    protected static string $resource = TransactionLedgerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Transaction Ledger listed successfully.';
    }
}
