<?php

namespace App\Filament\Resources\TourGuides\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class TourGuideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Pemandu')
                    ->required(),
                TextInput::make('specialty')
                    ->label('Spesialisasi'),
                TextInput::make('languages')
                    ->label('Bahasa'),
                TextInput::make('experience')
                    ->label('Pengalaman'),
                TextInput::make('transport')
                    ->label('Transportasi'),
                Textarea::make('description')
                    ->label('Deskripsi Singkat')
                    ->columnSpanFull(),
            ]);
    }
}
