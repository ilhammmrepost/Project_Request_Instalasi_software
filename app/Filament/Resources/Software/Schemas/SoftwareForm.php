<?php

namespace App\Filament\Resources\Software\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SoftwareForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_software')
                    ->required(),
                TextInput::make('versi')
                    ->required(),
                TextInput::make('level_software')
                    ->required()
                    ->numeric(),
            ]);
    }
}
