<?php

namespace App\Filament\Resources\IslandHopping\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Table;

class IslandHoppingTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Paket')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('duration')
                    ->label('Durasi')
                    ->searchable(),
                TextColumn::make('price')
                    ->label('Harga Longboat')
                    ->money('IDR', decimalPlaces: 0, locale: 'id_ID')
                    ->searchable(),
                TextColumn::make('price_speedboat')
                    ->label('Harga Speedboat')
                    ->money('IDR', decimalPlaces: 0, locale: 'id_ID')
                    ->placeholder('-')
                    ->searchable(),
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
