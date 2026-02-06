<?php

namespace App\Filament\Resources\Hostings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class HostingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('package_name')->label('Package Name'),
                                TextEntry::make('main_domain')->label('Main Domain'),
                                TextEntry::make('server_ip')->label('Server IP'),
                                TextEntry::make('username')->label('Username'),
                                TextEntry::make('password')
                                    ->label('Password')
                                    ->copyable()
                                    ->copyMessage('Password copied')
                                    ->copyMessageDuration(1500),
                                TextEntry::make('provider.name')->label('Provider'),
                                TextEntry::make('purchase_date')
                                    ->label('Purchase Date')
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
                                TextEntry::make('notes')->label('Notes'),
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
