<?php

namespace App\Filament\Resources\BirdSpecies\Pages;

use App\Filament\Resources\BirdSpecies\BirdSpeciesResource;
use App\Filament\Traits\HasRecordNavigation;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBirdSpecies extends EditRecord
{
    use HasRecordNavigation;

    protected static string $resource = BirdSpeciesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ...$this->getNavigationActions(),
            DeleteAction::make(),
        ];
    }
}

