<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\FreelancerResource\Pages;
use App\Filament\Admin\Resources\FreelancerResource\RelationManagers;
use App\Models\Freelancer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FreelancerResource extends Resource
{
    protected static ?string $model = Freelancer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_frelancer')
                            ->minLength(2)
                            ->maxLength(255)
                            ->columnSpan('full')
                            ->required(),
                Forms\Components\TextInput::make('nomor_telpon')
                            ->numeric()
                            ->columnSpan('full')
                            ->required(),
                Forms\Components\DatePicker::make('tanggal_masuk')
                            ->columnSpan('full')
                            ->required(),
                Forms\Components\Select::make('status')
                            ->required()
                            ->options([
                                'aktif' => 'aktif',
                                'tidak aktif' => 'tidak aktif',
                            ])
                            ->label('status'),
                Forms\Components\Select::make('user_id')
                            ->required()
                            ->relationship('user', 'email')
                            ->label('nama akun'),
                Forms\Components\TextInput::make('api_token')
                            ->label('Token')
                            ->visibleOn('edit'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_frelancer')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('nomor_telpon')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_masuk')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('status')
                ->badge()
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('api_token')->copyable(),
               
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
            'index' => Pages\ListFreelancers::route('/'),
            'create' => Pages\CreateFreelancer::route('/create'),
            'edit' => Pages\EditFreelancer::route('/{record}/edit'),
        ];
    }
}
