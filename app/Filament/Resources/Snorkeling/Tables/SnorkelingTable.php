<?php

namespace App\Filament\Resources\Snorkeling\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Table;

class SnorkelingTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Destinasi Snorkeling')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Harga Trip')
                    ->money('IDR', decimalPlaces: 0, locale: 'id_ID')
                    ->searchable(),
                TextColumn::make('duration')
                    ->label('Durasi')
                    ->searchable(),
                TextColumn::make('includes.info')
                    ->label('Kapasitas Peserta')
                    ->default('1 - 4 orang'),
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
