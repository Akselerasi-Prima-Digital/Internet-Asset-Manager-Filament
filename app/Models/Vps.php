<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'package_name',
    'server_ip',
    'username',
    'password',
    'operating_system',
    'provider_id',
    'purchase_date',
    'expiry_date',
    'renewal_cost',
    'status',
    'notes',
])]
#[Table(name: 'vps', key: 'uuid')]
class Vps extends Model
{
    use HasFactory;
    use HasUuids;

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id', 'uuid');
    }

    protected function casts(): array
    {
        return [
            'password' => 'encrypted',
            'notes' => 'encrypted',
        ];
    }
}
