<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'uuid';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'registrar_id',
        'hosting',
        'registration_date',
        'expiry_date',
        'renewal_cost',
        'status',
        'notes',
    ];

    protected $casts = [
        'notes' => 'encrypted',
    ];

    public function registrar()
    {
        return $this->belongsTo(Registrar::class, 'registrar_id', 'uuid');
    }
}
