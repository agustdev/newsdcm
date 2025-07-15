<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'documento',
        'tipo',
        'unav_pertenece'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // Crear un accesor para filtrar el campo documento por tipo de documento
    public function getDocumentoAttribute($value)
    {
        return preg_replace('/-/', '', $value);
    }
    public function getDocumentoFormateadoAttribute()
    {
        $raw = $this->documento;

        // Formato típico dominicano: 3-7-1 (ej. cédula o RNC)
        if (strlen($raw) === 11) {
            return substr($raw, 0, 3) . '-' .
                substr($raw, 3, 7) . '-' .
                substr($raw, 10, 1);
        }

        // Si no cumple 11 dígitos, lo devuelve tal cual
        return $raw;
    }
    // relacion uno a muchos
    public function movimientos()
    {
        return $this->hasMany(Movimientos::class);
    }

    public function movimientos_internacionales()
    {
        return $this->hasMany(MovimientosInternacionales::class);
    }

    public function embarcaciones()
    {
        return $this->hasMany(Embarcaciones::class, 'no_documento')
            ->orWhere('no_documento', $this->documento)
            ->orWhere('no_documento', $this->documento_formateado);
    }

    public function embarcaciones_internacionales()
    {
        return $this->hasMany(EmbarcacionesInternacionales::class, 'no_documento', 'documento');
    }

    public function capitanes_registrados_usuarios()
    {
        return $this->hasMany(CapitanesRegUsuarios::class);
    }
}
