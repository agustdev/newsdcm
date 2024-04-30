<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovimientosInternacionales extends Model
{
    use HasFactory;
    // relacion uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function capitan_internacional()
    {
        return $this->hasOne(Capitanes::class, 'mov_inter_id');
    }

    public function embarcacion_internacional()
    {
        return $this->hasOne(EmbarcacionesInternacionales::class, 'id', 'emb_inter_id');
    }
}
