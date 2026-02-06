<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vps extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'vps';

    protected $primaryKey = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
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
    ];

    protected $casts = [
        'password' => 'encrypted',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id', 'uuid');
    }
}
