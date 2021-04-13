<?php

namespace App\Http\Controllers;

use App\Models\{TimeRecord, User};
use Illuminate\Http\Request;

class TimeRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        /* 
        --Vista del index de TimeRecord
        --Este index envia el user para el nombre de usuario
        --Envia tambien el historico de horarios de los ultimos 7 registros
         */

        $user = User::find(auth()->user()->id);
        $records = TimeRecord::where('user_id', $user->id)->latest()->take(7)->get();
        return view('record.timeRecord',[
            'user'    => $user,
            'records' => $records
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* 
        --Busca si existe un registro en el dia de hoy, en caso de no existir, crea un registro
        --en caso de existir revisa el ultimo check y agrega el mas reciente
        --en caso de estar llenos los registros retorna un error
        --Debido al problema de uso de colecciones lo envio como array
         */
        $record = TimeRecord::where('user_id', auth()->user()->id)
                                ->where('day',date('Y-m-d'))
                                ->first();

        $columns = ['mealout', 'mealin', 'checkout'];

        if($record == null){

            $this->createRecord();
            return back();

        }else{
            $id = $record['id'];
        }

        foreach($columns as $column){
            
            if($record[$column] == null){

                $this->updateRecord($column, $id);
                return back();
            }
        }

        if($record['checkout'] != null){
            
            return redirect('horarios')->with('error', 'Limite de registros alcanzados!!');
        }
    }

    public function createRecord(){

        TimeRecord::create([
            'day'       => date('Y/m/d'),
            'checkin'   => date('H:i:s'),
            'user_id'   => auth()->user()->id,
        ])->save;
        
    }

    public function updateRecord($column, $id){

        $record = TimeRecord::find($id);
        $record->$column = date('H:i:s');
        $record->save();
    }
}
