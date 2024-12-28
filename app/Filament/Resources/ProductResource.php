<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    protected static ?string $navigationGroup = 'Products';

    public static function shouldRegisterNavigation(): bool
    {
        return optional(auth()->user())->can('view products');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_type_id')
                    ->label('Product Type')
                    ->required()
                    ->relationship('productType', 'name')
                    ->searchable()
                    ->placeholder('Select a product type')
                    ->preload(),

                Forms\Components\TextInput::make('price')
                    ->label('Price')
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
                Tables\Columns\TextColumn::make('productType.name')
                    ->label('Product Type')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->sortable()
                    ->numeric()
                    ->searchable()
                    ->formatStateUsing(function ($state) {
                        return $state ? '$ '.number_format($state, 2) : '-';
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->date()
                    ->label('Created at'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->date()
                    ->label('Deleted at'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
