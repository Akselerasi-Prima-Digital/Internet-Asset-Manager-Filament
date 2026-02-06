<?php

namespace App\Filament\Resources\Registrars\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class RegistrarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Group::make()
                    ->schema([
                        Section::make()
                            ->schema([
                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Registrar Name')
                                            ->maxLength(255)
                                            ->required(),
                                    ]),
                            ]),
                    ]),
            ])->columns(1);
    }
}
