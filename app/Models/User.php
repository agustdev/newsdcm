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
        return $this->hasMany(Embarcaciones::class, 'no_documento', 'documento');
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
