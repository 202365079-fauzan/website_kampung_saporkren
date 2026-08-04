<?php

namespace App\Filament\Resources\Homestays\Pages;

use App\Filament\Resources\Homestays\HomestayResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHomestay extends EditRecord
{
    protected static string $resource = HomestayResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
