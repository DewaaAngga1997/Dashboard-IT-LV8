<?php

namespace App\Filament\Resources\PrinterResource\Widgets;

use App\Models\Printer;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PrinterCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Printers', Printer::count())
                ->color('success')
            // ->description('All Printers Department')
        ];
    }
    public function getColumnSpan(): int | string | array
    {
        return '1';
    }
}
