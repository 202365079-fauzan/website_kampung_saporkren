<?php

namespace App\Filament\Resources\BirdWatching\Pages;

use App\Filament\Resources\BirdWatching\BirdWatchingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBirdWatching extends ListRecords
{
    protected static string $resource = BirdWatchingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
