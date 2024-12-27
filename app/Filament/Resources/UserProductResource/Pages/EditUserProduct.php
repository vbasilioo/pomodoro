<?php

namespace App\Filament\Resources\UserProductResource\Pages;

use App\Filament\Resources\UserProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditUserProduct extends EditRecord
{
    protected static string $resource = UserProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'User Product edited successfully.';
    }
}
