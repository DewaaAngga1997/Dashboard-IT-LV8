<?php

namespace App\Filament\Resources\AnydeskResource\Pages;

use App\Filament\Resources\AnydeskResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAnydesks extends ListRecords
{
    protected static string $resource = AnydeskResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
