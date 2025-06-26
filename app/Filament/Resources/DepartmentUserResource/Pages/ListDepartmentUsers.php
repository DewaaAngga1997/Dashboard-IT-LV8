<?php

namespace App\Filament\Resources\DepartmentUserResource\Pages;

use App\Filament\Resources\DepartmentUserResource;
use App\Filament\Resources\DepartmentUserResource\Widgets\DepartmentUsersCount;
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
    protected function getHeaderWidgets(): array
    {
        return [
            DepartmentUsersCount::class,
        ];
    }
}
