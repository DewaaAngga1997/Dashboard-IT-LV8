<?php

namespace App\Filament\Widgets;

use App\Models\Computer;
use Filament\Widgets\ChartWidget;

class PCStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Status PC';

    protected function getData(): array
    {
        $baik = Computer::where('ket_pc', 'Baik')->count();
        $maintenance = Computer::where('ket_pc', 'Perlu Maintenance')->count();
        $rusak = Computer::where('ket_pc', 'Rusak')->count();

        return [
            'datasets' => [
                [
                    'label' => 'Total PC',
                    'data' => [$baik, $maintenance, $rusak],
                    'backgroundColor' => ['#16a34a', '#facc15', '#dc2626'], // warna hijau, kuning, merah
                ],
            ],
            'labels' => ['Baik', 'Perlu Maintenance', 'Rusak'],

        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
