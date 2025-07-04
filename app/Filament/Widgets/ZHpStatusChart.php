<?php

namespace App\Filament\Widgets;

use App\Models\Handphone;
use Filament\Widgets\ChartWidget;

class ZHpStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Status Handphone';

    protected function getData(): array
    {

        $baik = Handphone::where('ket_Handphone', 'Baik')->count();
        $rusak = Handphone::where('ket_Handphone', 'Rusak')->count();
        return [
            'datasets' => [
                [
                    'label' => 'Total Handphone',
                    'data' => [$baik, $rusak],
                    'backgroundColor' => ['#16a34a', '#dc2626'], // warna hijau, kuning, merah
                ],
            ],
            'labels' => ['Baik', 'Rusak'],

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
