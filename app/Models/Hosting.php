<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'package_name',
    'main_domain',
    'server_ip',
    'username',
    'password',
    'provider_id',
    'purchase_date',
    'expiry_date',
    'renewal_cost',
    'status',
    'notes',
])]
class Hosting extends Model
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'uuid';

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
