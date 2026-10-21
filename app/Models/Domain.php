<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'name',
    'registrar_id',
    'hosting',
    'registration_date',
    'expiry_date',
    'renewal_cost',
    'status',
    'notes',
])]
class Domain extends Model
{
    use HasFactory;
    use HasUuids;

    protected $primaryKey = 'uuid';

    public function registrar()
    {
        return $this->belongsTo(Registrar::class, 'registrar_id', 'uuid');
    }

    protected function casts(): array
    {
        return [
            'notes' => 'encrypted',
        ];
    }
}
