<?php

namespace App\Filament\Resources\RoutineResource\Pages;

use App\Filament\Resources\RoutineResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageRoutines extends ManageRecords
{
    protected static string $resource = RoutineResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
