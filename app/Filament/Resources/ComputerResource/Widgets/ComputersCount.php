<?php

namespace App\Filament\Resources\ComputerResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Computer;

class ComputersCount extends BaseWidget
{

    protected function getStats(): array
    {
        return [
            Stat::make('Total Computers', Computer::count())
                ->color('success')
                ->description('All Computers Department'),


            Stat::make('PC Baik', Computer::where('ket_pc', 'Baik')->count())
                ->icon('heroicon-o-check-circle')
                ->description('Total PC dalam kondisi baik')
                ->color('success'),

            Stat::make('PC Perlu Maintenance', Computer::where('ket_pc', 'Perlu Maintenance')->count())
                ->icon('heroicon-o-exclamation-circle')
                ->description('Total PC perlu maintenance')
                ->color('warning'),

            Stat::make('PC Rusak', Computer::where('ket_pc', 'Rusak')->count())
                ->icon('heroicon-o-x-circle')
                ->description('Total PC rusak')
                ->color('danger'),
        ];
    }
    // public function getColumnSpan(): int | string | array
    // {
    //     return '1';
    // }
}
