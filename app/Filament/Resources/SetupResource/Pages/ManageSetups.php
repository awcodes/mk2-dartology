<?php

namespace App\Filament\Resources\SetupResource\Pages;

use App\Filament\Resources\SetupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSetups extends ManageRecords
{
    protected static string $resource = SetupResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
