<?php

namespace App\Filament\Widgets;

use App\Models\Printer;
use Filament\Widgets\ChartWidget;

class PrinterStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Status Printer';

    protected function getData(): array
    {
        $baik = Printer::where('ket_Printer', 'Baik')->count();
        $maintenance = Printer::where('ket_Printer', 'Perlu Maintenance')->count();
        $rusak = Printer::where('ket_Printer', 'Rusak')->count();
        return [
            'datasets' => [
                [
                    'label' => 'Total Printer',
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
