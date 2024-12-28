<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoleResource\Pages;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Spatie\Permission\Models\Role;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationGroup = 'Permissions and Roles';

    public static function shouldRegisterNavigation(): bool
    {
        return optional(auth()->user())->can('view roles');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('name')->minLength(2)->maxLength(255),
                    Select::make('permissions')->multiple()->relationship('permissions', 'name')->preload(),
                ]),
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
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('guard_name')->label('Guard name')->sortable(),
                Tables\Columns\TextColumn::make('created_at')->label('Created at')->sortable()->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label(''),
                Tables\Actions\RestoreAction::make()->label(''),
                Tables\Actions\DeleteAction::make()->label(''),
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
            'index' => Pages\ListRoles::route('/'),
            'create' => Pages\CreateRole::route('/create'),
            'edit' => Pages\EditRole::route('/{record}/edit'),
        ];
    }
}
