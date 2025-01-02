<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PomodoroSessionResource\Pages;
use App\Models\Pomodoro;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PomodoroSessionResource extends Resource
{
    protected static ?string $model = Pomodoro::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    protected static ?string $navigationGroup = 'User';

    public static function shouldRegisterNavigation(): bool
    {
        return optional(auth()->user())->can('view sessions');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('pomodoro_type')
                    ->label('Pomodoro Type')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('time_expected')
                    ->label('Time Expected')
                    ->time()
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return $state ? $state.' minute(s)' : '—';
                    }),
                Tables\Columns\TextColumn::make('started_at')
                    ->label('Started at')
                    ->date()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('finished_at')
                    ->label('Finished at')
                    ->date()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('abandoned_at')
                    ->label('Abandoned at')
                    ->date()
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                // Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label(''),
                // Tables\Actions\EditAction::make()->label(''),
                // Tables\Actions\RestoreAction::make()->label(''),
                // Tables\Actions\DeleteAction::make()->label(''),
                // Tables\Actions\ReplicateAction::make()->label(''),
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPomodoroSessions::route('/'),
            // 'create' => Pages\CreatePomodoroSession::route('/create'),
            // 'edit' => Pages\EditPomodoroSession::route('/{record}/edit'),
        ];
    }
}
