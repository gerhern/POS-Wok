<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\{UserRequest, EditEmployeeRequest};
use App\Models\User;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Muestra todos los users activos para desplegarlos en una tabla

        $users = User::where('status', 'Activo')->get();
        //$users = User::all();
        return view('employee',[
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Muestra el formulario de crear empleados
        return view('createEmployee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $userRequest)
    {
        
        //Crea el nuevo usuario en la db
        User::insert([
            'name'       => $userRequest->name,
            'password'   => bcrypt($userRequest->password),
            'privileges' => $userRequest->privileges,
            'salary'     => $userRequest->salary,
            'status'     => 'Activo',
        ]);
        return redirect('/empleados');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $userData = User::find($id);
        return view('updateEmployee', [
            'user' => $userData
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditEmployeeRequest $editEmployeeRequest, $id)
    {
        //editamos al usuario
        $data = User::find($id);
        $data->name = $editEmployeeRequest->name;
        $data->privileges = $editEmployeeRequest->privileges;
        $data->salary = $editEmployeeRequest->salary;
        $data->save();
        return redirect('/empleados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Hace un soft delete
        $data = User::find($id);
        $data->status = 'Inactivo';
        $data->save();
        return back();
    }
}
