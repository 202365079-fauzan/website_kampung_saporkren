<?php

namespace App\Filament\Resources\Homestays\Pages;

use App\Filament\Resources\Homestays\HomestayResource;
use App\Filament\Traits\HasRecordNavigation;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomestay extends EditRecord
{
    use HasRecordNavigation;

    protected static string $resource = HomestayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ...$this->getNavigationActions(),
            DeleteAction::make(),
        ];
    }
}

