<?php

namespace App\Filament\Resources\Laboratoria\Pages;

use App\Filament\Resources\Laboratoria\LaboratoriumResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListLaboratoria extends ListRecords
{
    protected static string $resource = LaboratoriumResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
