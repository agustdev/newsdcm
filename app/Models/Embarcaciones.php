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

    public function conductor()
    {
        return $this->hasMany(Conductores::class, 'emb_id');
    }
    public function inteligencia()
    {
        return $this->hasOne(Inteligencias::class, 'matricula_embarcacion', 'matricula')->where('estado', 'Activa');
    }

    public function notificaciones()
    {
        return $this->hasMany(NotificacionesArribo::class, 'emb_id');
    }

    public function representantes()
    {
        return $this->belongsToMany(Representantes::class, 'embarcacion_representante');
    }
}
