<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Room;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use Notifiable;

    protected $guard = "client";
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'descripcion',
        'nif',
        'password',
        'profile_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function rooms()
    {
        return $this->belongsToMany(Room::class)->withPivot("id", "precio", "tipo_pension", "fecha_entrada", "fecha_salida", "num_noches")->orderByPivot("created_at", "desc")->withTimestamps();
    }
    public function client_direction()
    {
        return $this->hasOne(Client_direction::class);
    }
}
