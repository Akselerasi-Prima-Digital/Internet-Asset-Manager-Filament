<?php

namespace App\Filament\Resources\Hostings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class HostingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('package_name'),
                TextEntry::make('main_domain'),
                TextEntry::make('server_ip'),
                TextEntry::make('username'),
                TextEntry::make('password')
                    ->label('Password')
                    ->copyable()
                    ->copyMessage('Password copied')
                    ->copyMessageDuration(1500),
                TextEntry::make('provider.name')->label('Provider'),
                TextEntry::make('purchase_date')
                    ->date(),
                TextEntry::make('expiry_date')
                    ->date(),
                TextEntry::make('renewal_cost')
                    ->numeric()
                    ->formatStateUsing(
                        fn($state) => $state !== null
                            ? 'Rp ' . number_format($state, 0, ',', '.')
                            : '-'
                    ),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
