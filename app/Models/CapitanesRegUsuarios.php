<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapitanesRegUsuarios extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public function capitanes_registrados()
    {
        return $this->hasMany(CapitanesRegistrados::class, 'id', 'cap_id');
    }
}
