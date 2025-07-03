<?php

namespace App\Filament\Resources\HandphoneResource\Widgets;

use App\Models\Handphone;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class HandphoneCount extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Handphones', Handphone::count())
                ->color('success')
        ];
    }
    public function getColumnSpan(): int | string | array
    {
        return '1';
    }
}
