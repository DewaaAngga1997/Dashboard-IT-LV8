<?php

namespace App\Filament\Resources\LaptopsResource\Widgets;

use App\Filament\Resources\ComputerResource\Widgets\ComputersCount;
use App\Models\Laptops;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LaptopsCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Laptops', Laptops::count())
                ->color('success')
                ->description('All Laptops Department'),

            Stat::make('Laptop Baik', Laptops::where('ket_laptop', 'Baik')->count())
                ->icon('heroicon-o-check-circle')
                ->description('Total Laptop dalam kondisi baik')
                ->color('success'),

            Stat::make('Laptop Perlu Maintenance', Laptops::where('ket_laptop', 'Perlu Maintenance')->count())
                ->icon('heroicon-o-exclamation-circle')
                ->description('Total Laptop perlu maintenance')
                ->color('warning'),

            Stat::make('Laptop Rusak', Laptops::where('ket_laptop', 'Rusak')->count())
                ->icon('heroicon-o-x-circle')
                ->description('Total Laptop rusak')
                ->color('danger'),

        ];
    }
    // public function getColumnSpan(): int | string | array
    // {
    //     return '1'; // Inilah bagian yang membuat layout full
    // }
}
