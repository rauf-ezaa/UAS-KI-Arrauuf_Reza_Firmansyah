<?php

namespace App\Filament\Admin\Resources\DetailProjectResource\Pages;

use App\Filament\Admin\Resources\DetailProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDetailProjects extends ListRecords
{
    protected static string $resource = DetailProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
