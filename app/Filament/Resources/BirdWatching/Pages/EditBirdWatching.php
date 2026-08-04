<?php

namespace App\Filament\Resources\BirdWatching\Pages;

use App\Filament\Resources\BirdWatching\BirdWatchingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBirdWatching extends EditRecord
{
    protected static string $resource = BirdWatchingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
