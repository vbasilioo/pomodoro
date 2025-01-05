<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationGroup = 'User';

    public static function shouldRegisterNavigation(): bool
    {
        return optional(auth()->user())->can('view users');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->required(),
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
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('created_at')->label('Created at')->sortable()->date(),
                Tables\Columns\TextColumn::make('deleted_at')->label('Deleted at')->sortable()->date(),
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
                Tables\Actions\BulkAction::make('exportPdf')
                    ->label('Export PDF')
                    ->icon('heroicon-o-document')
                    ->action(function (\Illuminate\Support\Collection $records) {
                        $users = $records->all();
                        $pdf = Pdf::loadView('pdf.users', ['users' => $users]);
                        return response()->streamDownload(fn() => print($pdf->output()), 'users.pdf');
                    })
                    ->requiresConfirmation()
                    ->color('primary'),
                Tables\Actions\BulkAction::make('emailData')
                    ->label('Send to E-mail')
                    ->icon('heroicon-o-inbox')
                    ->action(function (\Illuminate\Support\Collection $records) {
                        $users = $records->all();
                
                        $pdf = Pdf::loadView('pdf.users', ['users' => $users]);
                
                        \Mail::send([], [], function ($message) use ($pdf) {
                            $message->to('vbasilio2019@gmail.com')
                                ->subject('User Report')
                                ->attachData($pdf->output(), 'users.pdf', [
                                    'mime' => 'application/pdf',
                                ]);
                        });
                
                        // Log::info('success', 'Email enviado com sucesso!');
                    })
                    ->requiresConfirmation()
                    ->color('success'),                
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
