<?php

namespace App\Filament\Widgets;

use App\Models\User\User;
use Filament\Widgets\ChartWidget;

class ChartUserRegistration extends ChartWidget
{
    protected static ?string $heading = 'User Data';

    protected function getData(): array
    {
        $usersRegisters = User::query()
                ->get()
                ->groupBy(fn($user) => $user->created_at->format('Y-m-d'))
                ->map(fn($users, $date) => [
                    'x' => $date,
                    'y' => $users->count()
                ])
                ->values()
                ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'User Registrations',
                    'data' => $usersRegisters,
                    'borderColor' => '#4CAF50',
                    'backgroundColor' => 'rgba(76, 175, 80, 0.2)',
                ]
            ]
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
