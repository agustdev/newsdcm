<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    // relacion uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function capitan()
    {
        return $this->hasOne(Capitanes::class, 'mov_id');
    }

    public function embarcacion()
    {
        return $this->hasOne(Embarcaciones::class, 'id', 'emb_id');
    }

    public function getRouteKeyName()
    {
        return 'url_id';
    }
}
