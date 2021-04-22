<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    //Relaciones de tablas
    //Relacion de 1 a 1 con appointments
    //Relacion de n a n con Items por medio de tabla intermedia

    public function appointment(){
        return $this->belongsTo(Appointment::class);
    }

    public function item(){
        return $this->belongsToMany(Item::class);
    }
}
