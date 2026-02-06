<?php

namespace App\Filament\Resources\Domains\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DomainInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('name'),
                                TextEntry::make('registrar.name')->label('Registrar'),
                                TextEntry::make('hosting'),
                                TextEntry::make('registration_date')
                                    ->date(),
                                TextEntry::make('expiry_date')
                                    ->date(),
                                TextEntry::make('renewal_cost')
                                    ->numeric()
                                    ->formatStateUsing(
                                        fn ($state) => $state !== null
                                            ? 'Rp '.number_format($state, 0, ',', '.')
                                            : '-'
                                    ),
                                TextEntry::make('status'),
                                TextEntry::make('created_at')
                                    ->dateTime(),
                                TextEntry::make('updated_at')
                                    ->dateTime(),
                            ]),
                    ])->columnSpan(2),
                Section::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('notes'),
                            ]),
                    ]),
            ])->columns(3);
    }
}
