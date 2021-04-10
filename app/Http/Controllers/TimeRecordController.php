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
    public function index()
    {
        //
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
        //
        $record = TimeRecord::where('user_id', auth()->user()->id)->latest()->take(1)->get()->toArray();
        $columns = ['mealout', 'mealin', 'checkout'];

        if($record == null){

            $this->createRecord();
            return back();

        }else{
            $id = $record[0]['id'];
        }

        foreach($columns as $column){
            
            if($record[0][$column] == null){

                $this->updateRecord($column, $id);
                return back();
            }
        }

        if($record[0]['checkout'] != null){

            $this->createRecord();
            return back();
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
