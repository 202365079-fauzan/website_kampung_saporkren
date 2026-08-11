<?php

namespace App\Filament\Resources\Snorkeling\Pages;

use App\Filament\Resources\Snorkeling\SnorkelingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSnorkeling extends ListRecords
{
    protected static string $resource = SnorkelingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
