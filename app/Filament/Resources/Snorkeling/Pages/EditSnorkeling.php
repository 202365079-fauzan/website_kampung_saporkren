<?php

namespace App\Filament\Resources\Snorkeling\Pages;

use App\Filament\Resources\Snorkeling\SnorkelingResource;
use App\Filament\Traits\HasRecordNavigation;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSnorkeling extends EditRecord
{
    use HasRecordNavigation;

    protected static string $resource = SnorkelingResource::class;

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
        if (is_array($inc) && isset($inc['info'])) {
            $data['info'] = $inc['info'];
        } elseif (is_string($inc)) {
            $data['info'] = $inc;
        } else {
            $data['info'] = '1 - 4 orang';
        }

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['type'] = 'snorkeling_trip';
        $info = $data['info'] ?? '1 - 4 orang';
        $data['includes'] = ['info' => $info];
        unset($data['info']);

        return $data;
    }
}
