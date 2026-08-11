<?php

namespace App\Filament\Resources\IslandHopping\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TagsInput;
use Filament\Schemas\Schema;

class IslandHoppingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('type')
                    ->default('island_hopping'),
                TextInput::make('name')
                    ->label('Nama Paket')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Misal: 1 Day Trip / 2 Days 1 Night Trip'),
                TextInput::make('duration')
                    ->label('Durasi')
                    ->maxLength(255)
                    ->placeholder('Misal: 1 Day Trip / 2 Days 1 Night'),
                TextInput::make('price')
                    ->label('Harga Longboat (Rp)')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                TextInput::make('price_speedboat')
                    ->label('Harga Speedboat')
                    ->numeric()
                    ->prefix('Rp'),
                TagsInput::make('islands')
                    ->label('Daftar Tujuan')
                    ->placeholder('Tekan enter untuk menambah nama pulau')
                    ->columnSpanFull(),
                TagsInput::make('includes')
                    ->label('Fasilitas & Layanan Termasuk')
                    ->placeholder('Tekan enter untuk menambah (contoh: 1-4 orang, Makan Siang)')
                    ->columnSpanFull(),
            ]);
    }
}
