<?php

namespace App\Filament\Resources\BirdWatching;

use App\Filament\Resources\BirdWatching\Pages\CreateBirdWatching;
use App\Filament\Resources\BirdWatching\Pages\EditBirdWatching;
use App\Filament\Resources\BirdWatching\Pages\ListBirdWatching;
use App\Filament\Resources\BirdWatching\Schemas\BirdWatchingForm;
use App\Filament\Resources\BirdWatching\Tables\BirdWatchingTable;
use App\Models\TourPackage;
use BackedEnum;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class BirdWatchingResource extends Resource
{
    protected static ?string $model = TourPackage::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-eye';

    protected static \UnitEnum|string|null $navigationGroup = 'Konservasi & Satwa';

    protected static ?string $slug = 'bird-watching-packages';
    
    protected static ?string $modelLabel = 'Paket Bird Watching';
    
    protected static ?string $pluralModelLabel = 'Paket Bird Watching';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('type', 'bird_watching');
    }

    public static function form(Schema $schema): Schema
    {
        return BirdWatchingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BirdWatchingTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBirdWatching::route('/'),
            'create' => CreateBirdWatching::route('/create'),
            'edit' => EditBirdWatching::route('/{record}/edit'),
        ];
    }
}
