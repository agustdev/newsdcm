<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmbarcacionesInternacionales extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $casts = [
        'fecha_validez' => 'date',
    ];

    public function movimiento()
    {
        return $this->hasMany(MovimientosInternacionales::class, 'emb_inter_id');
    }
}
