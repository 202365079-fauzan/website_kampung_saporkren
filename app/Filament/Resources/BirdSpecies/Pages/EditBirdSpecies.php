<?php

namespace App\Filament\Resources\BirdSpecies\Pages;

use App\Filament\Resources\BirdSpecies\BirdSpeciesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBirdSpecies extends EditRecord
{
    protected static string $resource = BirdSpeciesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
