<?php

namespace App\Filament\Resources\Vps\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VpsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('package_name')
                    ->label('Package Name')
                    ->searchable(),
                TextColumn::make('server_ip')
                    ->label('Server IP')
                    ->searchable(),
                TextColumn::make('username')
                    ->label('Username')
                    ->searchable(),
                TextColumn::make('operating_system')
                    ->label('Operating System')
                    ->searchable(),
                TextColumn::make('provider.name')
                    ->label('Provider')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('purchase_date')
                    ->label('Purchase Date')
                    ->date('d-m-Y')
                    ->sortable(),
                TextColumn::make('expiry_date')
                    ->label('Expiry Date')
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                        if (! $state) {
                            return '-';
                        }
                        $expiry = \Carbon\Carbon::parse($state);
                        $days = now()->diffInDays($expiry, false); // hasil integer

                        return $expiry->format('d-m-Y') . ' (' . (int) $days . ' days)';
                    }),
                TextColumn::make('renewal_cost')
                    ->label('Renewal Cost')
                    ->numeric()
                    ->money('IDR', locale: 'id')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Active' => 'success',
                        'Inactive' => 'danger',
                        default => 'primary',
                    })
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('status', 'created_at');
    }
}
