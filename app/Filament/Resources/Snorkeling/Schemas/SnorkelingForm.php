<?php

namespace App\Filament\Resources\Snorkeling\Schemas;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SnorkelingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Hidden::make('type')
                    ->default('snorkeling_trip'),
                TextInput::make('name')
                    ->label('Nama Destinasi Snorkeling')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Misal: Friwen Well / Arborek'),
                TextInput::make('duration')
                    ->label('Durasi')
                    ->default('1 Hari')
                    ->maxLength(255),
                TextInput::make('price')
                    ->label('Harga')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->placeholder('Misal: 250000'),
                TextInput::make('info')
                    ->label('Kapasitas / Info Peserta')
                    ->default('1 - 4 orang')
                    ->placeholder('Misal: 1 - 4 orang'),
            ]);
    }
}
