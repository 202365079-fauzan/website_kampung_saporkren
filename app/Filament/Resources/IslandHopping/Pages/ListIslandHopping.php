<?php

namespace App\Filament\Resources\IslandHopping\Pages;

use App\Filament\Resources\IslandHopping\IslandHoppingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIslandHopping extends ListRecords
{
    protected static string $resource = IslandHoppingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
