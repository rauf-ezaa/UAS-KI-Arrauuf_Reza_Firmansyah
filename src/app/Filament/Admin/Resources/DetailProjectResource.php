<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\DetailProjectResource\Pages;
use App\Filament\Admin\Resources\DetailProjectResource\RelationManagers;
use App\Models\DetailProject;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DetailProjectResource extends Resource
{
    protected static ?string $model = DetailProject::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('project_id')
                        ->required()
                        ->relationship('project', 'nama_project')
                        ->label('nama project'),
                Forms\Components\Select::make('freelancer_id')
                        ->required()
                        ->relationship('frelancer', 'nama_frelancer')
                        ->label('nama freelancer'),
                    Forms\Components\TextInput::make('progress_note')
                        ->columnSpan('full')
                        ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('project.nama_project')
                ->badge()
                ->label('nama project')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('progress_note')
                ->label('catatan project')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                ->label('tanggal ditambah')
                ->sortable()
                ->searchable(),
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
            'index' => Pages\ListDetailProjects::route('/'),
            'create' => Pages\CreateDetailProject::route('/create'),
            'edit' => Pages\EditDetailProject::route('/{record}/edit'),
        ];
    }
}
