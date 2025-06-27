<?php

namespace App\Filament\Resources\DepartmentUserResource\Widgets;

use App\Models\DepartmentUser;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DepartmentUsersCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Department Users', DepartmentUser::count())
                ->color('success')
        ];
    }
    public function getColumnSpan(): int | string | array
    {
        return '1';
    }
}
