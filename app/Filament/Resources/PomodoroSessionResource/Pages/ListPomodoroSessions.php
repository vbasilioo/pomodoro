<?php

namespace App\Filament\Resources\PomodoroSessionResource\Pages;

use App\Filament\Resources\PomodoroSessionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPomodoroSessions extends ListRecords
{
    protected static string $resource = PomodoroSessionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Pomodoro session created successfully.';
    }
}
