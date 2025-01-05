<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CardDashboardCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', \App\Models\User\User::count()),
            Stat::make('Total Pomodoros', \App\Models\Pomodoro::count()),
            Stat::make('Total Products', \App\Models\Marketplace\Product::count()),
            Stat::make('Total Transactions', \App\Models\Wallet\Transaction::count()),
        ];
    }
}
