<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserProductResource\Pages;
use App\Filament\Resources\UserProductResource\RelationManagers;
use App\Models\UserProduct;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserProductResource extends Resource
{
    protected static ?string $model = UserProduct::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $navigationGroup = 'Products';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('view userProducts');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User Name')
                    ->required()
                    ->relationship('user', 'name')
                    ->searchable()
                    ->placeholder('Select a user name'),
                Forms\Components\Select::make('product_id')
                    ->label('Product Name')
                    ->required()
                    ->relationship('product', 'productType.name')
                    ->searchable()
                    ->placeholder('Select a product name'),
                Forms\Components\TextInput::make('bought_at')
                    ->label('Bought at')
                    ->required(),
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
                Tables\Columns\TextColumn::make('product.productType.name')
                    ->label('Product Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('bought_at')->sortable()->searchable()->label('Bought at'),
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
            'index' => Pages\ListUserProducts::route('/'),
            'create' => Pages\CreateUserProduct::route('/create'),
            'edit' => Pages\EditUserProduct::route('/{record}/edit'),
        ];
    }
}
