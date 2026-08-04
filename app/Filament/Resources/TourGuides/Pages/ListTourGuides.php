<?php

namespace App\Filament\Resources\TourGuides\Pages;

use App\Filament\Resources\TourGuides\TourGuideResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTourGuides extends ListRecords
{
    protected static string $resource = TourGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
