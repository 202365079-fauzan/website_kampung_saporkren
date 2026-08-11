<?php

namespace App\Filament\Resources\IslandHopping;

use App\Filament\Resources\IslandHopping\Pages\CreateIslandHopping;
use App\Filament\Resources\IslandHopping\Pages\EditIslandHopping;
use App\Filament\Resources\IslandHopping\Pages\ListIslandHopping;
use App\Filament\Resources\IslandHopping\Schemas\IslandHoppingForm;
use App\Filament\Resources\IslandHopping\Tables\IslandHoppingTable;
use App\Models\TourPackage;
use BackedEnum;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class IslandHoppingResource extends Resource
{
    protected static ?string $model = TourPackage::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-map';

    protected static \UnitEnum|string|null $navigationGroup = 'Ekowisata & Akomodasi';

    protected static ?string $slug = 'island-hopping-packages';

    protected static ?string $modelLabel = 'Paket Island Hopping';

    protected static ?string $pluralModelLabel = 'Paket Island Hopping';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('type', 'island_hopping');
    }

    public static function form(Schema $schema): Schema
    {
        return IslandHoppingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IslandHoppingTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListIslandHopping::route('/'),
            'create' => CreateIslandHopping::route('/create'),
            'edit' => EditIslandHopping::route('/{record}/edit'),
        ];
    }
}
