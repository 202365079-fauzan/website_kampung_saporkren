<?php

namespace App\Filament\Resources\UmkmProducts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UmkmProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('category')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Kerajinan Tangan', 'Kerajinan' => 'warning',
                        'Makanan Olahan', 'Olahan Makanan', 'Makanan' => 'success',
                        default => 'info',
                    }),
                TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR', decimalPlaces: 0, locale: 'id_ID')
                    ->searchable(),
                TextColumn::make('maker')
                    ->label('Produsen / Perajin')
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
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
