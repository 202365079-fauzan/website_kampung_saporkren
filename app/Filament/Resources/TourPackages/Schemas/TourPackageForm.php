<?php

namespace App\Filament\Resources\TourPackages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Schemas\Schema;

class TourPackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Paket')
                    ->required()
                    ->maxLength(255),
                Select::make('type')
                    ->label('Jenis Paket')
                    ->options([
                        'tour_5_pulau' => 'Paket Tour 5 Pulau (1 Day - 6 Day)',
                        'trip' => 'Paket Trip Ke Pulau',
                        'snorkeling' => 'Paket Trip Snorkeling',
                        'bird_watching' => 'Paket Bird Watching',
                    ])
                    ->required(),
                TextInput::make('duration')
                    ->label('Durasi')
                    ->maxLength(255)
                    ->placeholder('Misal: 1 Hari / 3 Jam (Opsional)'),
                TextInput::make('price')
                    ->label('Harga')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->placeholder('Misal: 300000'),
                TagsInput::make('includes')
                    ->label('Termasuk / Fasilitas')
                    ->placeholder('Tekan enter untuk menambah')
                    ->columnSpanFull(),
            ]);
    }
}
