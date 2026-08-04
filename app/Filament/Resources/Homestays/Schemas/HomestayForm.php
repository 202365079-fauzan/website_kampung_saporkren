<?php

namespace App\Filament\Resources\Homestays\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class HomestayForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Homestay')
                    ->required(),
                TextInput::make('owner')
                    ->label('Pemilik'),
                Textarea::make('short_description')
                    ->label('Deskripsi Singkat')
                    ->columnSpanFull(),
                Textarea::make('facilities')
                    ->label('Fasilitas')
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->label('Harga (Per Malam)')
                    ->numeric()
                    ->prefix('Rp'),
                FileUpload::make('main_photo')
                    ->label('Foto Utama')
                    ->image()
                    ->imageEditor()
                    ->imageResizeMode('contain')
                    ->imageResizeTargetWidth('1080')
                    ->imageResizeTargetHeight('1080')
                    ->directory('homestays')
                    ->hint(fn ($record) => $record?->main_photo ? 'File saat ini: ' . $record->main_photo : null),
                TextInput::make('maps_link')
                    ->label('Link Google Maps'),
            ]);
    }
}
