<?php

namespace App\Filament\Widgets;

use App\Models\Laptops;
use Filament\Widgets\ChartWidget;

class LaptopStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Status Laptop';

    protected function getData(): array
    {
        $baik = Laptops::where('ket_laptop', 'Baik')->count();
        $maintenance = Laptops::where('ket_laptop', 'Perlu Maintenance')->count();
        $rusak = Laptops::where('ket_laptop', 'Rusak')->count();
        return [
            'datasets' => [
                [
                    'label' => 'Total Laptop',
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
