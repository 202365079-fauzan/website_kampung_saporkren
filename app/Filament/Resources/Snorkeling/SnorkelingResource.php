<?php

namespace App\Filament\Resources\Snorkeling;

use App\Filament\Resources\Snorkeling\Pages\CreateSnorkeling;
use App\Filament\Resources\Snorkeling\Pages\EditSnorkeling;
use App\Filament\Resources\Snorkeling\Pages\ListSnorkeling;
use App\Filament\Resources\Snorkeling\Schemas\SnorkelingForm;
use App\Filament\Resources\Snorkeling\Tables\SnorkelingTable;
use App\Models\TourPackage;
use BackedEnum;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class SnorkelingResource extends Resource
{
    protected static ?string $model = TourPackage::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-lifebuoy';

    protected static \UnitEnum|string|null $navigationGroup = 'Ekowisata & Akomodasi';

    protected static ?string $slug = 'snorkeling-packages';

    protected static ?string $modelLabel = 'Paket Snorkeling';

    protected static ?string $pluralModelLabel = 'Paket Snorkeling Trip';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('type', 'snorkeling_trip');
    }

    public static function form(Schema $schema): Schema
    {
        return SnorkelingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SnorkelingTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSnorkeling::route('/'),
            'create' => CreateSnorkeling::route('/create'),
            'edit' => EditSnorkeling::route('/{record}/edit'),
        ];
    }
}
