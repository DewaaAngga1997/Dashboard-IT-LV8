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

            Stat::make('Laptop Baik', Printer::where('ket_Printer', 'Baik')->count())
                ->icon('heroicon-o-check-circle')
                ->description('Total Laptop dalam kondisi baik')
                ->color('success'),

            Stat::make('Laptop Perlu Maintenance', Printer::where('ket_Printer', 'Perlu Maintenance')->count())
                ->icon('heroicon-o-exclamation-circle')
                ->description('Total Laptop perlu maintenance')
                ->color('warning'),

            Stat::make('Laptop Rusak', Printer::where('ket_Printer', 'Rusak')->count())
                ->icon('heroicon-o-x-circle')
                ->description('Total Laptop rusak')
                ->color('danger'),

        ];
    }
    // public function getColumnSpan(): int | string | array
    // {
    //     return '1';
    // }
}
