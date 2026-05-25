<?php

namespace App\Filament\Resources\Laboratoria\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class LaboratoriumForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('no_lab')
                    ->required()
                    ->unique(),
                TextInput::make('nama_lab')
                    ->required(),
                TextInput::make('level_lab')
                    ->required()
                    ->numeric(),
                TextInput::make('jumlah_pc')
                    ->required()
                    ->numeric(),
                TextInput::make('no_induk_admin')
                    ->required(),
            ]);
    }
}
