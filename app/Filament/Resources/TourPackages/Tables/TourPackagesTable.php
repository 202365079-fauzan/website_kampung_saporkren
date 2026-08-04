<?php

namespace App\Filament\Resources\TourPackages\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Table;

class TourPackagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Paket')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Jenis Paket')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'tour_5_pulau' => 'info',
                        'trip' => 'primary',
                        'snorkeling' => 'success',
                        'bird_watching' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'tour_5_pulau' => 'Tour 5 Pulau',
                        'trip' => 'Trip Pulau',
                        'snorkeling' => 'Snorkeling',
                        'bird_watching' => 'Bird Watching',
                        default => $state,
                    }),
                TextColumn::make('price')
                    ->label('Harga')
                    ->searchable(),
                TextColumn::make('duration')
                    ->label('Durasi')
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('type')
                    ->label('Filter Jenis Paket')
                    ->options([
                        'tour_5_pulau' => 'Paket Tour 5 Pulau (1 Day - 6 Day)',
                        'trip' => 'Paket Trip Ke Pulau',
                        'snorkeling' => 'Paket Trip Snorkeling',
                        'bird_watching' => 'Paket Bird Watching',
                    ]),
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
