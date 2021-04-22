<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    //Relaciones entre tablas
    //Relacion de n a n con orders

    public function order(){
        return $this->belongsToMany(Order::class);
    }

}
