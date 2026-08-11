<?php

namespace App\Filament\Resources\TourGuides\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TourGuidesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Pemandu')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('specialty')
                    ->label('Spesialisasi')
                    ->searchable(),
                TextColumn::make('languages')
                    ->label('Bahasa')
                    ->searchable(),
                TextColumn::make('experience')
                    ->label('Pengalaman')
                    ->searchable(),
                TextColumn::make('transport')
                    ->label('Transportasi')
                    ->searchable(),
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
