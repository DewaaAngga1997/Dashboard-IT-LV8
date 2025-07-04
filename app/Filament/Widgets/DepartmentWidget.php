<?php

namespace App\Filament\Widgets;

use App\Models\Department;
use App\Models\DepartmentUser;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DepartmentWidget extends BaseWidget
{
    protected function getColumns(): int
    {
        return 2; // ⬅️ Membagi jadi 2 kolom
    }
    protected function getStats(): array
    {
        return [
            Stat::make('Total Departments', Department::count())
                ->description('All Departments')
                ->descriptionIcon('heroicon-o-arrow-trending-up', IconPosition::After)
                ->chart([1, 3, 40, 90, 50, 100])  // simulasi garis grafik
                ->color('success')
                ->extraAttributes([
                    'class' => 'rounded-xl shadow-lg',
                ]),
            Stat::make('Total Department Users', DepartmentUser::count())
                ->description('All Department Users')
                ->descriptionIcon('heroicon-o-arrow-trending-up', IconPosition::After)
                ->chart([1, 3, 40, 90, 50, 100]) // simulasi garis grafik
                ->color('success')
                ->extraAttributes([
                    'class' => 'rounded-xl shadow-lg',
                ]),
        ];
    }
}
