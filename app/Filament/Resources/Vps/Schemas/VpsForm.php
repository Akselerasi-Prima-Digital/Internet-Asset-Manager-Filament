<?php

namespace App\Filament\Resources\Vps\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;

class VpsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('package_name')
                    ->label('Package Name')
                    ->maxLength(255)
                    ->required(),
                TextInput::make('server_ip')
                    ->label('Server IP')
                    ->rule('ip')
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('username')
                    ->label('Username')
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('password')
                    ->label('Password')
                    ->default(null)
                    ->maxLength(255),
                TextInput::make('operating_system')
                    ->label('Operating System')
                    ->maxLength(255)
                    ->default(null),
                Select::make('provider_id')
                    ->relationship('provider', 'name')
                    ->label('Provider')
                    ->preload()
                    ->searchable()
                    ->required(),
                DatePicker::make('purchase_date')
                    ->label('Purchase Date')
                    ->maxDate(now())
                    ->required(),
                DatePicker::make('expiry_date')
                    ->label('Expiry Date')
                    ->after('purchase_date')
                    ->required(),
                TextInput::make('renewal_cost')
                    ->label('Renewal Cost')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->minValue(0)
                    ->maxValue(2147483647)
                    ->mask(RawJs::make('$money($input)'))
                    ->stripCharacters(',')
                    ->dehydrateStateUsing(fn($state) => (int) str_replace([',', '.'], '', $state)),
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
