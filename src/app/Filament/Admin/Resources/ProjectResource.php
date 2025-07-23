<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectResource\Pages;
use App\Filament\Admin\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            Forms\Components\TextInput::make('nama_project')
                ->minLength(2)
                ->maxLength(255)
                ->columnSpan('full')
                ->required(),
            Forms\Components\TextInput::make('deskripsI_project')
                ->minLength(2)
                ->maxLength(255)
                ->columnSpan('full')
                ->required(),
            Forms\Components\DatePicker::make('tanggal_mulai')
                ->columnSpan('full')
                ->required(),
            Forms\Components\DatePicker::make('tanggal_akhir')
                ->columnSpan('full')
                ->required(),
            Forms\Components\Select::make('dibuat_oleh')
                        ->required()
                        ->relationship('pembuat', 'nama_frelancer')
                        ->label('pembuat project'),
        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_project')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('deskripsI_project')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_mulai')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_akhir')
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
