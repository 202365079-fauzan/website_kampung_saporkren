<?php

namespace App\Filament\Resources\TourGuides\Pages;

use App\Filament\Resources\TourGuides\TourGuideResource;
use App\Filament\Traits\HasRecordNavigation;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTourGuide extends EditRecord
{
    use HasRecordNavigation;

    protected static string $resource = TourGuideResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ...$this->getNavigationActions(),
            DeleteAction::make(),
        ];
    }
}

