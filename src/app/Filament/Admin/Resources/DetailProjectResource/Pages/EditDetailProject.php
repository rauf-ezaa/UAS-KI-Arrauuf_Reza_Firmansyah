<?php

namespace App\Filament\Admin\Resources\DetailProjectResource\Pages;

use App\Filament\Admin\Resources\DetailProjectResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDetailProject extends EditRecord
{
    protected static string $resource = DetailProjectResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
