<?php

namespace App\Filament\Resources\BirdWatching\Pages;

use App\Filament\Resources\BirdWatching\BirdWatchingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBirdWatching extends CreateRecord
{
    protected static string $resource = BirdWatchingResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = 'bird_watching';
        return $data;
    }
}
