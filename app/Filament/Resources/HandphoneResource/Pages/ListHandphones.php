<?php

namespace App\Filament\Resources\HandphoneResource\Pages;

use App\Filament\Resources\HandphoneResource;
use App\Filament\Resources\HandphoneResource\Widgets\HandphoneCount;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHandphones extends ListRecords
{
    protected static string $resource = HandphoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
            HandphoneCount::class,
        ];
    }
}
