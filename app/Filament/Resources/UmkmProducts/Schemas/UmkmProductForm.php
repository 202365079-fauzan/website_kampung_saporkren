<?php

namespace App\Filament\Resources\UmkmProducts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class UmkmProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Produk')
                    ->required(),
                Select::make('category')
                    ->label('Kategori Produk')
                    ->options([
                        'Kerajinan Tangan' => 'Kerajinan Tangan',
                        'Makanan Olahan' => 'Olahan Makanan',
                    ])
                    ->required(),
                TextInput::make('price')
                    ->label('Harga')
                    ->numeric()
                    ->prefix('Rp'),
                TextInput::make('maker')
                    ->label('Pembuat / Kelompok Perajin'),
                Textarea::make('description')
                    ->label('Deskripsi Produk')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Foto Produk')
                    ->disk('public')
                    ->directory('umkm-products')
                    ->visibility('public')
                    ->image()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth('1600')
                    ->imageResizeTargetHeight('1600')
                    ->hint(fn ($record) => $record?->image ? 'File saat ini: ' . $record->image : null),
            ]);
    }
}
