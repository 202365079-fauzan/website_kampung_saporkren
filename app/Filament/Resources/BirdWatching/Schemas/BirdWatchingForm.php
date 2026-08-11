<?php

namespace App\Filament\Resources\BirdWatching\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TagsInput;
use Filament\Schemas\Schema;

class BirdWatchingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('type')
                    ->default('bird_watching'),
                TextInput::make('name')
                    ->label('Nama Paket Bird Watching')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Misal: Morning Birding Spotting'),
                TextInput::make('duration')
                    ->label('Waktu Pengamatan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('price')
                    ->label('Harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),
                TagsInput::make('includes')
                    ->label('Fasilitas & Layanan Termasuk')
                    ->placeholder('Tekan enter untuk menambah (contoh: Pemandu Birding Lokal, Akses Hutan)')
                    ->columnSpanFull(),
            ]);
    }
}
