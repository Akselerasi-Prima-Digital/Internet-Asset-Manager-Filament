<?php

namespace App\Filament\Resources\Registrars\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RegistrarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Registrar Name')
                    ->maxLength(255)
                    ->required(),
            ]);
    }
}
