<?php

namespace App\Filament\Resources\BirdSpecies;

use App\Filament\Resources\BirdSpecies\Pages\CreateBirdSpecies;
use App\Filament\Resources\BirdSpecies\Pages\EditBirdSpecies;
use App\Filament\Resources\BirdSpecies\Pages\ListBirdSpecies;
use App\Filament\Resources\BirdSpecies\Schemas\BirdSpeciesForm;
use App\Filament\Resources\BirdSpecies\Tables\BirdSpeciesTable;
use App\Models\BirdSpecies;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BirdSpeciesResource extends Resource
{
    protected static ?string $model = BirdSpecies::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-globe-americas';

    protected static \UnitEnum|string|null $navigationGroup = 'Konservasi & Satwa';
    
    protected static ?string $modelLabel = 'Spesies Burung';
    
    protected static ?string $pluralModelLabel = 'Spesies Burung';

    protected static ?string $recordTitleAttribute = 'local_name';



    public static function form(Schema $schema): Schema
    {
        return BirdSpeciesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BirdSpeciesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBirdSpecies::route('/'),
            'create' => CreateBirdSpecies::route('/create'),
            'edit' => EditBirdSpecies::route('/{record}/edit'),
        ];
    }
}
