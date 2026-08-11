<?php

namespace App\Filament\Resources\IslandHopping\Pages;

use App\Filament\Resources\IslandHopping\IslandHoppingResource;
use App\Filament\Traits\HasRecordNavigation;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditIslandHopping extends EditRecord
{
    use HasRecordNavigation;

    protected static string $resource = IslandHoppingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ...$this->getNavigationActions(),
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $inc = $data['includes'] ?? [];
        $data['islands'] = is_array($inc) && isset($inc['islands'])
            ? $inc['islands']
            : ['Arborek', 'Friwen Well', 'Batu Lima', 'Mioskun', 'Kali Biru (Blue River) / Warsambin'];

        $data['includes'] = is_array($inc) && isset($inc['items'])
            ? $inc['items']
            : (is_array($inc) ? array_values($inc) : []);

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
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
