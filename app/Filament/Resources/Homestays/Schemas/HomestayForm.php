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
                TextInput::make('capacity')
                    ->label('Kapasitas')
                    ->placeholder('Misal: 2-4 Orang'),
                Textarea::make('short_description')
                    ->label('Deskripsi Singkat')
                    ->columnSpanFull(),
                Textarea::make('facilities')
                    ->label('Fasilitas')
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->label('Harga')
                    ->numeric()
                    ->prefix('Rp'),
                FileUpload::make('image')
                    ->label('Foto')
                    ->disk('public')
                    ->directory('homestays')
                    ->visibility('public')
                    ->image()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth('1600')
                    ->imageResizeTargetHeight('1600')
                    ->hint(fn ($record) => $record?->image ? 'Image: ' . $record->image : null),
                TextInput::make('maps_link')
                    ->label('Link Google Maps'),
            ]);
    }
}
