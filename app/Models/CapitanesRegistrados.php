<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapitanesRegistrados extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $casts = [
        'fecha_expira' => 'date',
    ];
    public function capitanes_registrados_usuarios()
    {
        return $this->belongsToMany(CapitanesRegUsuarios::class);
    }
}
