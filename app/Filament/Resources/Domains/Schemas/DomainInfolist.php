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
                                TextEntry::make('name')->label('Domain Name'),
                                TextEntry::make('registrar.name')->label('Registrar'),
                                TextEntry::make('hosting')->label('Hosting'),
                                TextEntry::make('registration_date')
                                    ->label('Registration Date')
                                    ->date(),
                                TextEntry::make('expiry_date')
                                    ->label('Expiry Date')
                                    ->date(),
                                TextEntry::make('renewal_cost')
                                    ->label('Renewal Cost')
                                    ->numeric()
                                    ->formatStateUsing(
                                        fn($state) => $state !== null
                                            ? 'Rp ' . number_format($state, 0, ',', '.')
                                            : '-'
                                    ),
                                TextEntry::make('status')->label('Status'),
                                TextEntry::make('created_at')
                                    ->label('Created At')
                                    ->dateTime(),
                                TextEntry::make('updated_at')
                                    ->label('Updated At')
                                    ->dateTime(),
                            ]),
                    ])->columnSpan(2),
                Section::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('notes')->label('Notes')
                                    ->markdown(),
                            ]),
                    ]),
            ])->columns(3);
    }
}
