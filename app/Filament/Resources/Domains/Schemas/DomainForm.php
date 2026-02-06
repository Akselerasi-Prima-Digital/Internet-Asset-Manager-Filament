<?php

namespace App\Filament\Resources\Domains\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;

class DomainForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Domain Name')
                    ->required(),
                Select::make('registrar_id')
                    ->relationship('registrar', 'name')
                    ->label('Registrar')
                    ->preload()
                    ->searchable()
                    ->required(),
                Select::make('hosting')
                    ->label('Hosting')
                    ->options([
                        '-' => '-',
                        'Shared Hosting' => 'Shared hosting',
                        'Cloud Hosting' => 'Cloud hosting',
                        'WordPress Hosting' => 'WordPress hosting',
                        'Unlimited Hosting' => 'Unlimited hosting',
                        'VPS' => 'VPS',
                        'Dedicated Server' => 'Dedicated server',
                    ])
                    ->default('-')
                    ->required(),
                DatePicker::make('registration_date')
                    ->label('Registration Date')
                    ->required(),
                DatePicker::make('expiry_date')
                    ->label('Expiry Date')
                    ->required(),
                TextInput::make('renewal_cost')
                    ->label('Renewal Cost')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0)
                    ->maxValue(2147483647)
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(','),
                Select::make('status')
                    ->label('Status')
                    ->options(['Active' => 'Active', 'Inactive' => 'Inactive'])
                    ->default('Active')
                    ->required(),
                Textarea::make('notes')
                    ->label('Notes')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
