<?php

namespace App\Filament\Resources\DepartmentUserResource\Pages;

use App\Filament\Resources\DepartmentUserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDepartmentUser extends EditRecord
{
    protected static string $resource = DepartmentUserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
