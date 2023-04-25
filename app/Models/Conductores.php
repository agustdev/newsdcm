<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductores extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function movimientos()
    {
        return $this->belongsTo(Movimientos::class, 'emb_id');
    }

    public function vehiculos()
    {
        return $this->belongsTo(Vehiculos::class, 'veh_id');
    }

    public function embarcaciones()
    {
        return $this->belongsTo(Embarcaciones::class, 'emb_id');
    }
}
