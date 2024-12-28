<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionLedgerResource\Pages;
use App\Models\TransactionLedger;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TransactionLedgerResource extends Resource
{
    protected static ?string $model = TransactionLedger::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrows-right-left';

    protected static ?string $navigationGroup = 'Wallet';

    public static function shouldRegisterNavigation(): bool
    {
        return optional(auth()->user())->can('view transactionLedgers');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('transaction_id')
                    ->label('Transaction')
                    ->required()
                    ->relationship('transaction', 'id')
                    ->searchable()
                    ->placeholder('Select a transaction'),
                Forms\Components\Select::make('user_id')
                    ->label('User Name')
                    ->required()
                    ->relationship('user', 'name')
                    ->searchable()
                    ->placeholder('Select a user name'),
                Forms\Components\Select::make('transaction_type')
                    ->label('Transaction Type')
                    ->required()
                    ->options([
                        'credit' => 'Credit',
                        'debit' => 'Debit',
                    ])
                    ->placeholder('Select a transaction type'),
                Forms\Components\TextInput::make('amount')
                    ->label('Amount')
                    ->required()
                    ->numeric(),
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
                Tables\Columns\TextColumn::make('transaction.price')
                    ->label('Price')
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        $formattedBalance = is_numeric($state) ? '$ ' . number_format((float)$state, 2) : '-';
                        return $formattedBalance;
                    }),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Type')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount')
                    ->label('Amount')
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        $formattedBalance = is_numeric($state) ? '$ ' . number_format((float)$state, 2) : '-';
                        return $formattedBalance;
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created at')
                    ->date()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('Deleted at')
                    ->date()
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label(''),
                Tables\Actions\EditAction::make()->label(''),
                Tables\Actions\RestoreAction::make()->label(''),
                Tables\Actions\DeleteAction::make()->label(''),
                Tables\Actions\ReplicateAction::make()->label(''),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListTransactionLedgers::route('/'),
            'create' => Pages\CreateTransactionLedger::route('/create'),
            'edit' => Pages\EditTransactionLedger::route('/{record}/edit'),
        ];
    }
}
