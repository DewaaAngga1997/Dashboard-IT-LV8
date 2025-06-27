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

        ];
    }
}
