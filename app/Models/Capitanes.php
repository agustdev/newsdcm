<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitanes extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // relación uno a muchos
    public function movimientos()
    {
        return $this->belongsTo(Movimiento::class);
    }
}
