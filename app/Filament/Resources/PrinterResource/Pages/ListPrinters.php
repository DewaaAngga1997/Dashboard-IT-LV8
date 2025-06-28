<?php

namespace App\Filament\Resources\PrinterResource\Pages;


use App\Filament\Resources\PrinterResource;
use App\Filament\Resources\PrinterResource\Widgets\PrinterCount;
use Filament\Resources\Pages\ListRecords;



class ListPrinters extends ListRecords
{
    protected static string $resource = PrinterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            PrinterCount::class,
        ];
    }
}
