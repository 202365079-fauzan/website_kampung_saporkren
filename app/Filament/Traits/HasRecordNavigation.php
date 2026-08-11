<?php

namespace App\Filament\Traits;

use Filament\Actions\Action;

trait HasRecordNavigation
{
    protected function getNavigationActions(): array
    {
        $record = $this->getRecord();
        if (! $record) {
            return [];
        }

        $modelClass = static::getResource()::getModel();
        $keyName = $record->getKeyName();
        $keyValue = $record->getKey();

        $previousRecord = $modelClass::where($keyName, '<', $keyValue)
            ->orderBy($keyName, 'desc')
            ->first();

        $nextRecord = $modelClass::where($keyName, '>', $keyValue)
            ->orderBy($keyName, 'asc')
            ->first();

        return [
            Action::make('previousRecord')
                ->label('Sebelumnya')
                ->icon('heroicon-o-chevron-left')
                ->color('gray')
                ->disabled(! $previousRecord)
                ->url(fn () => $previousRecord ? static::getResource()::getUrl('edit', ['record' => $previousRecord]) : null),

            Action::make('nextRecord')
                ->label('Berikutnya')
                ->icon('heroicon-o-chevron-right')
                ->iconPosition('after')
                ->color('gray')
                ->disabled(! $nextRecord)
                ->url(fn () => $nextRecord ? static::getResource()::getUrl('edit', ['record' => $nextRecord]) : null),
        ];
    }
}
