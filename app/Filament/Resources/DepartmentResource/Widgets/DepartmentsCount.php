<?php

namespace App\Filament\Resources\DepartmentResource\Widgets;

use App\Models\Department;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DepartmentsCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Departments', Department::count())
                ->color('success')
        ];
    }
    public function getColumnSpan(): int | string | array
    {
        return '1';
    }
}
