<?php

namespace App\Filament\Resources\Homestays\Pages;

use App\Filament\Resources\Homestays\HomestayResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHomestays extends ListRecords
{
    protected static string $resource = HomestayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
