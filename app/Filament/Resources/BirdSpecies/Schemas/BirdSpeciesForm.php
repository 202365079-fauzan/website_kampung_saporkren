<?php

namespace App\Filament\Resources\BirdSpecies\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BirdSpeciesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('local_name')
                    ->required(),
                TextInput::make('latin_name'),
                TextInput::make('habitat'),
                TextInput::make('best_time'),
                TextInput::make('conservation_status'),
                Textarea::make('description')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->imageEditor()
                    ->imageResizeMode('contain')
                    ->imageResizeTargetWidth('1080')
                    ->imageResizeTargetHeight('1080'),
            ]);
    }
}
