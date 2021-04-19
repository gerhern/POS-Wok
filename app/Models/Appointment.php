<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Appointment extends Model
{
    use HasFactory;

    //Relaciones de tablas

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function order(){
        return $this->hasOne(Order::class, 'appointment_id');
    }

    //Moddifiers
    //appweek es para dar formato a la tabla de citas semanales
    //appall es para dar un formato diferente a la tabla de todas las citas
    //status es para mostrar citas pendientes o atradas
    public function getappointmentWeekAttribute(){
        $data = explode('-', $this->date);
        $date = Carbon::createFromDate($data[0], $data[1], $data[2])->locale('es')->isoFormat('D/MMMM');
        
        return $date;
        }

    public function getappAllAttribute(){
        $data = explode('-', $this->date);
        $date = Carbon::createFromDate($data[0], $data[1], $data[2])->locale('es')->isoFormat('D/MMMM/YY');
        return $date;
    }

    public function getappointmentStatusAttribute(){
        
        $data = explode(':', $this->hour);
        $hour = Carbon::createFromTime($data[0], $data[1], $data[2]);

        if($this->status == 'Recibido'){
            return 'Recibido';
        }
        
        if(Carbon::now()->gt($hour->addMinutes(5))){
            return "Perdida";
        }else{
            return "Pendiente";
        }
    }
    
}
