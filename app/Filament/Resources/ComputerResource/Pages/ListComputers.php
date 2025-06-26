<?php

namespace App\Filament\Resources\ComputerResource\Pages;

use App\Filament\Resources\ComputerResource;
use App\Filament\Widgets\TotalComputerWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComputers extends ListRecords
{
    protected static string $resource = ComputerResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            // Actions\ExportAction::make(),
        ];
    }

    public function getMaxContentWidth(): string
    {
        return 'full';
    }
}
