<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TimeRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'user_id',
        'checkin'
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function getformatDateAttribute(){
        $data = explode('-', $this->day);
        $date = Carbon::createFromDate($data[0], $data[1], $data[2])->locale('es')->isoFormat('D/MMMM/YY');
        return $date;
    }
}
