<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hosting extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
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
    ];

    protected $casts = [
        'password' => 'encrypted',
        'notes' => 'encrypted',
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id', 'uuid');
    }
}
