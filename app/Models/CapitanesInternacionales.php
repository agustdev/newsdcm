<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapitanesInternacionales extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    // relación uno a muchos
    public function movimientos_internacionales()
    {
        return $this->belongsTo(MovimientosInternacionales::class);
    }
}
