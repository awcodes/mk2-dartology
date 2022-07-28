<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        $resource = static::getResource();

        return array_merge(
            [Action::make('save')->action('save')],
            (($resource::hasPage('view') && $resource::canView($this->getRecord())) ? [$this->getViewAction()] : []),
            ($resource::canDelete($this->getRecord()) ? [$this->getDeleteAction()] : []),
        );
    }
}
