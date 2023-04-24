<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinos extends Model
{
    use HasFactory;

    public function capitan()
    {
        return $this->hasOne(Capitanes::class);
    }
}
