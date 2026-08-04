<?php

namespace App\Filament\Resources\TourGuides\Pages;

use App\Filament\Resources\TourGuides\TourGuideResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTourGuide extends EditRecord
{
    protected static string $resource = TourGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
