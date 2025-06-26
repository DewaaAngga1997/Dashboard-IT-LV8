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
            Stat::make('Total of All Computer Departments', Computer::count())
                ->color('success')

        ];
    }
}
