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
            // ->description('All Computers Department')
        ];
    }
    public function getColumnSpan(): int | string | array
    {
        return '1';
    }
}
