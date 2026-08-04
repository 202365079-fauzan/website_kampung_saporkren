<?php

namespace App\Filament\Resources\Homestays\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class HomestaysTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('owner')
                    ->searchable(),
                TextColumn::make('price')
                    ->searchable(),
                ImageColumn::make('main_photo')
                    ->getStateUsing(function ($record) {
                        if (!$record->main_photo) return null;
                        if (str_starts_with($record->main_photo, 'img/')) {
                            return asset($record->main_photo);
                        }
                        return $record->main_photo;
                    }),
                TextColumn::make('maps_link')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
