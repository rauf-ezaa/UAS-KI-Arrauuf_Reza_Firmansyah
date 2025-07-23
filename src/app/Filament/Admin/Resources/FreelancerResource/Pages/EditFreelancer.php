<?php

namespace App\Filament\Admin\Resources\FreelancerResource\Pages;

use App\Filament\Admin\Resources\FreelancerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFreelancer extends EditRecord
{
    protected static string $resource = FreelancerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
