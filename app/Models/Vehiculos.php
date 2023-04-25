<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function movimientos()
    {
        return $this->belongsTo(Movimientos::class, 'emb_id');
    }

    public function conductores()
    {
        return $this->belongsTo(Conductores::class, 'con_id');
    }
}
