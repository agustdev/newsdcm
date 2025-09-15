<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Representantes extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function embarcaciones()
    {
        return $this->belongsToMany(Embarcaciones::class, 'embarcacion_representante', 'representante_id', 'emb_id');
    }
}
