<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NotificacionesArribo extends Model
{
    use HasFactory;

    public function embarcacion()
    {
        return $this->belongsTo(Embarcaciones::class, 'emb_id');
    }
}
