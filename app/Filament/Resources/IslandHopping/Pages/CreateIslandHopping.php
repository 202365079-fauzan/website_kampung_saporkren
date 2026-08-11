<?php

namespace App\Filament\Resources\IslandHopping\Pages;

use App\Filament\Resources\IslandHopping\IslandHoppingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateIslandHopping extends CreateRecord
{
    protected static string $resource = IslandHoppingResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['type'] = 'island_hopping';
        $islands = $data['islands'] ?? ['Arborek', 'Friwen Well', 'Batu Lima', 'Mioskun', 'Kali Biru (Blue River) / Warsambin'];
        $items = $data['includes'] ?? [];
        $data['includes'] = [
            'islands' => $islands,
            'items' => $items,
        ];
        unset($data['islands']);

        return $data;
    }
}
