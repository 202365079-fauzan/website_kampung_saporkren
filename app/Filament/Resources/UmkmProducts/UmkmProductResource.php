<?php

namespace App\Filament\Resources\UmkmProducts;

use App\Filament\Resources\UmkmProducts\Pages\CreateUmkmProduct;
use App\Filament\Resources\UmkmProducts\Pages\EditUmkmProduct;
use App\Filament\Resources\UmkmProducts\Pages\ListUmkmProducts;
use App\Filament\Resources\UmkmProducts\Schemas\UmkmProductForm;
use App\Filament\Resources\UmkmProducts\Tables\UmkmProductsTable;
use App\Models\UmkmProduct;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class UmkmProductResource extends Resource
{
    protected static ?string $model = UmkmProduct::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-shopping-bag';

    protected static \UnitEnum|string|null $navigationGroup = 'Ekonomi Adat & UMKM';
    
    protected static ?string $modelLabel = 'Produk UMKM';
    
    protected static ?string $pluralModelLabel = 'Produk & Kerajinan UMKM';

    protected static ?string $recordTitleAttribute = 'name';



    public static function form(Schema $schema): Schema
    {
        return UmkmProductForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UmkmProductsTable::configure($table);
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
            'index' => ListUmkmProducts::route('/'),
            'create' => CreateUmkmProduct::route('/create'),
            'edit' => EditUmkmProduct::route('/{record}/edit'),
        ];
    }
}
