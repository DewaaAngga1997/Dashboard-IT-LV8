<?php

namespace App\Filament\Resources\LaptopsResource\Pages;

use App\Filament\Resources\LaptopsResource;
use App\Filament\Resources\LaptopsResource\Widgets\LaptopsCount;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaptops extends ListRecords
{
    protected static string $resource = LaptopsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            LaptopsCount::class,
        ];
    }

    public function getMaxContentWidth(): string
    {
        return 'full';
    }
}
