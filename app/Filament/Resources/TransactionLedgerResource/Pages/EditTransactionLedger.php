<?php

namespace App\Filament\Resources\TransactionLedgerResource\Pages;

use App\Filament\Resources\TransactionLedgerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTransactionLedger extends EditRecord
{
    protected static string $resource = TransactionLedgerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Transaction Ledger edited successfully.';
    }
}
