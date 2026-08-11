<?php

namespace App\Filament\Resources\BirdWatching\Pages;

use App\Filament\Resources\BirdWatching\BirdWatchingResource;
use App\Filament\Traits\HasRecordNavigation;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBirdWatching extends EditRecord
{
    use HasRecordNavigation;

    protected static string $resource = BirdWatchingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ...$this->getNavigationActions(),
            DeleteAction::make(),
        ];
    }
}

