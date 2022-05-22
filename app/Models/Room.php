<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class);
    }

    public function images_rooms(){
        return $this->hasMany(Images_room::class);
    }

    public function clients(){
        return $this->belongsToMany(Client::class)->withPivot("id", "precio", "tipo_pension", "fecha_entrada", "fecha_salida", "num_noches");
    }
}
