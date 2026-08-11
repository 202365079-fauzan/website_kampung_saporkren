<?php

namespace App\Filament\Resources\Homestays;

use App\Filament\Resources\Homestays\Pages\CreateHomestay;
use App\Filament\Resources\Homestays\Pages\EditHomestay;
use App\Filament\Resources\Homestays\Pages\ListHomestays;
use App\Filament\Resources\Homestays\Schemas\HomestayForm;
use App\Filament\Resources\Homestays\Tables\HomestaysTable;
use App\Models\Homestay;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HomestayResource extends Resource
{
    protected static ?string $model = Homestay::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-home-modern';

    protected static \UnitEnum|string|null $navigationGroup = 'Ekowisata & Akomodasi';
    
    protected static ?string $modelLabel = 'Homestay';
    
    protected static ?string $pluralModelLabel = 'Homestays';

    protected static ?string $recordTitleAttribute = 'name';



    public static function form(Schema $schema): Schema
    {
        return HomestayForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HomestaysTable::configure($table);
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
            'index' => ListHomestays::route('/'),
            'create' => CreateHomestay::route('/create'),
            'edit' => EditHomestay::route('/{record}/edit'),
        ];
    }
}
