<?php

namespace App\Filament\Widgets;

use App\Models\BirdSpecies;
use App\Models\Homestay;
use App\Models\TourGuide;
use App\Models\UmkmProduct;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SaporkrenStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Akomodasi Homestay', Homestay::count() . ' Homestay')
                ->descriptionIcon('heroicon-m-home-modern')
                ->color('info')
                ->chart([7, 10, 12, 14, 15, 16]),

            Stat::make('Pemandu Wisata', TourGuide::count() . ' Guide')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success')
                ->chart([3, 4, 4, 5, 6, 6]),

            Stat::make('Spesies Burung', BirdSpecies::count() . ' Spesies')
                ->descriptionIcon('heroicon-m-sparkles')
                ->color('warning')
                ->chart([2, 3, 3, 4, 5, 5]),

            Stat::make('Produk UMKM Lokal', UmkmProduct::count() . ' Produk')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color('gray')
                ->chart([4, 6, 8, 10, 12, 14]),
        ];
    }
}
