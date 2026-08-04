<?php

namespace App\Filament\Resources\UmkmProducts\Pages;

use App\Filament\Resources\UmkmProducts\UmkmProductResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUmkmProduct extends EditRecord
{
    protected static string $resource = UmkmProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
