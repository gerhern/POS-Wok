<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Appointment extends Model
{
    use HasFactory;

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

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
}
