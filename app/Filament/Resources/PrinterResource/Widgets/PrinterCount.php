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
                ->description('All Printers Department'),

            Stat::make('Printer Baik', Printer::where('ket_Printer', 'Baik')->count())
                ->icon('heroicon-o-check-circle')
                ->description('Total Printer dalam kondisi baik')
                ->color('success'),

            Stat::make('Printer Perlu Maintenance', Printer::where('ket_Printer', 'Perlu Maintenance')->count())
                ->icon('heroicon-o-exclamation-circle')
                ->description('Total Printer perlu maintenance')
                ->color('warning'),

            Stat::make('Printer Rusak', Printer::where('ket_Printer', 'Rusak')->count())
                ->icon('heroicon-o-x-circle')
                ->description('Total Printer rusak')
                ->color('danger'),

        ];
    }
    // public function getColumnSpan(): int | string | array
    // {
    //     return '1';
    // }
}
