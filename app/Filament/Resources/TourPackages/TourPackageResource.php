<?php

namespace App\Filament\Resources\TourPackages;

use App\Filament\Resources\TourPackages\Pages\CreateTourPackage;
use App\Filament\Resources\TourPackages\Pages\EditTourPackage;
use App\Filament\Resources\TourPackages\Pages\ListTourPackages;
use App\Filament\Resources\TourPackages\Schemas\TourPackageForm;
use App\Filament\Resources\TourPackages\Tables\TourPackagesTable;
use App\Models\TourPackage;
use BackedEnum;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class TourPackageResource extends Resource
{
    protected static ?string $model = TourPackage::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-map';
    
    protected static \UnitEnum|string|null $navigationGroup = 'Layanan Wisata';
    
    protected static ?string $modelLabel = 'Paket Tour & Trip';
    
    protected static ?string $pluralModelLabel = 'Paket Tour & Trip';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('type', '!=', 'bird_watching');
    }

    public static function form(Schema $schema): Schema
    {
        return TourPackageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TourPackagesTable::configure($table);
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
            'index' => ListTourPackages::route('/'),
            'create' => CreateTourPackage::route('/create'),
            'edit' => EditTourPackage::route('/{record}/edit'),
        ];
    }
}
