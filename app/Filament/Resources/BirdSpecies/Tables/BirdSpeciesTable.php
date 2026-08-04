<?php

namespace App\Filament\Resources\BirdSpecies\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BirdSpeciesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('local_name')
                    ->label('Nama Lokal')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('latin_name')
                    ->label('Nama Latin')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('habitat')
                    ->label('Habitat')
                    ->searchable(),
                TextColumn::make('best_time')
                    ->label('Waktu Pengamatan')
                    ->searchable(),
                TextColumn::make('conservation_status')
                    ->label('Status Konservasi')
                    ->searchable(),
                ImageColumn::make('image')
                    ->label('Foto Burung'),
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
