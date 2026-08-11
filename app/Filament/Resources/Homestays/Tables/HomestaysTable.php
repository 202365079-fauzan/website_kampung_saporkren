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
                    ->label('Nama Homestay')
                    ->searchable(),
                TextColumn::make('owner')
                    ->label('Pemilik')
                    ->searchable(),
                TextColumn::make('capacity')
                    ->label('Kapasitas')
                    ->searchable(),
                TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR', decimalPlaces: 0, locale: 'id_ID')
                    ->searchable(),
                ImageColumn::make('image')
                    ->label('Foto')
                    ->getStateUsing(function ($record) {
                        if (!$record->image) return null;
                        if (str_starts_with($record->image, 'http://') || str_starts_with($record->image, 'https://')) {
                            return $record->image;
                        }
                        if (str_starts_with($record->image, 'assets/') || str_starts_with($record->image, 'img/')) {
                            return asset($record->image);
                        }
                        return asset('storage/' . $record->image);
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
