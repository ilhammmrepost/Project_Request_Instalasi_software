<?php

namespace App\Filament\Resources\Laboratoria\Pages;

use App\Filament\Resources\Laboratoria\LaboratoriumResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditLaboratorium extends EditRecord
{
    protected static string $resource = LaboratoriumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
