<?php

namespace App\Filament\Resources\TourGuides;

use App\Filament\Resources\TourGuides\Pages\CreateTourGuide;
use App\Filament\Resources\TourGuides\Pages\EditTourGuide;
use App\Filament\Resources\TourGuides\Pages\ListTourGuides;
use App\Filament\Resources\TourGuides\Schemas\TourGuideForm;
use App\Filament\Resources\TourGuides\Tables\TourGuidesTable;
use App\Models\TourGuide;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TourGuideResource extends Resource
{
    protected static ?string $model = TourGuide::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static \UnitEnum|string|null $navigationGroup = 'Ekowisata & Akomodasi';
    
    protected static ?string $modelLabel = 'Tour Guide';
    
    protected static ?string $pluralModelLabel = 'Pemandu Wisata';

    protected static ?string $recordTitleAttribute = 'name';



    public static function form(Schema $schema): Schema
    {
        return TourGuideForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TourGuidesTable::configure($table);
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
            'index' => ListTourGuides::route('/'),
            'create' => CreateTourGuide::route('/create'),
            'edit' => EditTourGuide::route('/{record}/edit'),
        ];
    }
}
