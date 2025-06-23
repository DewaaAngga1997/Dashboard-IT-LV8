<?php

namespace App\Filament\Resources\DepartmentUserResource\Pages;

use App\Filament\Resources\DepartmentUserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDepartmentUsers extends ListRecords
{
    protected static string $resource = DepartmentUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
