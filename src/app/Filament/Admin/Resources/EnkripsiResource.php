<?php

namespace App\Filament\Admin\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Enkripsi;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use App\Encryption\EncryptionHelper;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Admin\Resources\EnkripsiResource\Pages;
use App\Filament\Admin\Resources\EnkripsiResource\RelationManagers;

class EnkripsiResource extends Resource
{
    protected static ?string $model = Enkripsi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('enkripsi_data')
                        ->label('enkripsi_data')
                        ->required()
                        ->placeholder('Paste encrypted data here'),

                    TextInput::make('kunci_enkripsi')
                        ->label('kunci_enkripsi Key')
                        ->required()
                        ->password()
                        ->revealable(),

                    TextInput::make('dekripsi_data')
                        ->label('dekripsi_data')
                        ->disabled()
                        ->default(function ($get) {
                            $data = $get('enkripsi_data');
                            $key = $get('dekripsi_data');
                            return EncryptionHelper::decrypt($data, $key);
                        }),
                ])
                ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([
                Tables\Columns\TextColumn::make('enkripsi_data')
                ->label('Encrypted Data')
                ->limit(50)
                ->tooltip(fn ($record) => $record->enkripsi_data),

            Tables\Columns\TextColumn::make('kunci_enkripsi')
                ->label('Decryption Key')
                ->formatStateUsing(fn () => '***'), // Mask it securely

            Tables\Columns\TextColumn::make('dekripsi_data')
                ->label('Decrypted dekripsi_data')
                ->limit(100)
                ->tooltip(fn ($record) => $record->dekripsi_data),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListEnkripsis::route('/'),
            'create' => Pages\CreateEnkripsi::route('/create'),
            'edit' => Pages\EditEnkripsi::route('/{record}/edit'),
        ];
    }
}
