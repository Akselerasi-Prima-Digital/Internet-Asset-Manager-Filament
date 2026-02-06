<?php

namespace App\Filament\Resources\Vps;

use App\Filament\Resources\Vps\Pages\CreateVps;
use App\Filament\Resources\Vps\Pages\EditVps;
use App\Filament\Resources\Vps\Pages\ListVps;
use App\Filament\Resources\Vps\Pages\ViewVps;
use App\Filament\Resources\Vps\Schemas\VpsForm;
use App\Filament\Resources\Vps\Schemas\VpsInfolist;
use App\Filament\Resources\Vps\Tables\VpsTable;
use App\Models\Vps;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class VpsResource extends Resource
{
    protected static ?string $model = Vps::class;

    protected static ?string $title = 'VPS';

    protected static ?string $navigationLabel = 'VPS';

    protected static ?string $modelLabel = 'VPS';

    protected static string|UnitEnum|null $navigationGroup = 'Infrastructure';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedServer;

    protected static ?string $recordTitleAttribute = 'VPS';

    public static function form(Schema $schema): Schema
    {
        return VpsForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return VpsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VpsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListVps::route('/'),
            'create' => CreateVps::route('/create'),
            'view' => ViewVps::route('/{record}'),
            'edit' => EditVps::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'active')->count();
    }
}
