<?php

namespace App\Filament\Resources\BirdSpecies\Pages;

use App\Filament\Resources\BirdSpecies\BirdSpeciesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBirdSpecies extends ListRecords
{
    protected static string $resource = BirdSpeciesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
