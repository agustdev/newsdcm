<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Movimientos extends Model
{
    use HasFactory;
    use Notifiable;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $casts = [
        'fecha' => 'date',
    ];
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

    // relacion para conduces
    public function conductor()
    {
        return $this->hasOne(Conductores::class, 'mov_id');
    }

    public function vehiculo()
    {
        return $this->hasOne(Vehiculos::class, 'mov_id');
    }

    public function getRouteKeyName()
    {
        return 'url_id';
    }
}
