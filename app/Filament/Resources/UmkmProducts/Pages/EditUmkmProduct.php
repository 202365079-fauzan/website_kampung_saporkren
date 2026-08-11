<?php

namespace App\Filament\Resources\UmkmProducts\Pages;

use App\Filament\Resources\UmkmProducts\UmkmProductResource;
use App\Filament\Traits\HasRecordNavigation;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditUmkmProduct extends EditRecord
{
    use HasRecordNavigation;

    protected static string $resource = UmkmProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ...$this->getNavigationActions(),
            DeleteAction::make(),
        ];
    }
}

