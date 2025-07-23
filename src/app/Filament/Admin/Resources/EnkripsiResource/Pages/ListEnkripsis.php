<?php

namespace App\Filament\Admin\Resources\EnkripsiResource\Pages;

use App\Filament\Admin\Resources\EnkripsiResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEnkripsis extends ListRecords
{
    protected static string $resource = EnkripsiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
