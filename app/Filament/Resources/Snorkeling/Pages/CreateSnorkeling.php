<?php

namespace App\Filament\Resources\Snorkeling\Pages;

use App\Filament\Resources\Snorkeling\SnorkelingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSnorkeling extends CreateRecord
{
    protected static string $resource = SnorkelingResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = 'snorkeling_trip';
        $info = $data['info'] ?? '1 - 4 orang';
        $data['includes'] = ['info' => $info];
        unset($data['info']);

        return $data;
    }
}
