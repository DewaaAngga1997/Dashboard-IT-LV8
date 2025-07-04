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
                ->description('All Handphones Department'),

            Stat::make('Handphone Baik', Handphone::where('ket_handphone', 'Baik')->count())
                ->icon('heroicon-o-check-circle')
                ->description('Total Handphone dalam kondisi baik')
                ->color('success'),

            Stat::make('Handphone Rusak', Handphone::where('ket_handphone', 'Rusak')->count())
                ->icon('heroicon-o-x-circle')
                ->description('Total Handphone rusak')
                ->color('danger'),
        ];
    }
    // public function getColumnSpan(): int | string | array
    // {
    //     return '1';
    // }
}
