<?php

namespace App\Filament\Resources\UmkmProducts\Pages;

use App\Filament\Resources\UmkmProducts\UmkmProductResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUmkmProducts extends ListRecords
{
    protected static string $resource = UmkmProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
