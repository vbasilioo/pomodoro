<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LastPomodoros extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn() => \App\Models\Pomodoro::latest(),
            )
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('pomodoro_type'),
                Tables\Columns\TextColumn::make('started_at'),
                Tables\Columns\TextColumn::make('finished_at'),
            ]);
    }
}
