<?php

namespace App\Filament\Widgets;

use App\Models\Computer;
use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\Handphone;
use App\Models\Laptops;
use App\Models\Printer;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Dashboard extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Computers', Computer::count())
                ->description('All Computers Department')
                ->descriptionIcon('heroicon-o-computer-desktop', IconPosition::Before)
                ->chart([1, 1, 1, 1, 1, 1]) // simulasi garis grafik
                ->color('success')
                ->extraAttributes([
                    'class' => 'rounded-xl shadow-lg',
                ]),
            Stat::make('Total Laptops', Laptops::count())
                ->description('All Laptops Department')
                ->descriptionIcon('heroicon-o-tv', IconPosition::Before)
                ->chart([1, 1, 1, 1, 1, 1]) // simulasi garis grafik
                ->color('success')
                ->extraAttributes([
                    'class' => 'rounded-xl shadow-lg',
                ]),
            Stat::make('Total Printers', Printer::count())
                ->description('All Printers Department')
                ->descriptionIcon('heroicon-o-printer', IconPosition::Before)
                ->chart([1, 1, 1, 1, 1, 1]) // simulasi garis grafik
                ->color('success')
                ->extraAttributes([
                    'class' => 'rounded-xl shadow-lg',
                ]),
            Stat::make('Total Handphones', Handphone::count())
                ->description('All Handphones Department')
                ->descriptionIcon('heroicon-o-device-phone-mobile', IconPosition::Before)
                ->chart([1, 1, 1, 1, 1, 1]) // simulasi garis grafik
                ->color('success')
                ->extraAttributes([
                    'class' => 'rounded-xl shadow-lg',
                ]),

        ];
    }
}
