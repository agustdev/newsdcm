<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Embarcaciones extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $casts = [
        'fecha_validez' => 'date',
    ];

    public function movimiento()
    {
        return $this->hasMany(Movimientos::class, 'emb_id');
    }
}
