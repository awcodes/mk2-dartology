<?php

namespace App\Filament\Resources\CheckoutResource\Pages;

use App\Filament\Resources\CheckoutResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCheckouts extends ManageRecords
{
    protected static string $resource = CheckoutResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
