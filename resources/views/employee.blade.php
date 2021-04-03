@extends('layouts.page')
@section('content')

    <!--home-->
    <div class="w-screen h-screen ">
        <h2 class="text-4xl text-center my-4">Lista de Empleados</h2>

        <!--tabla de empleados-->
        <div class="w-full h-full overflow-scroll ">
                <table class="w-full mb-20">
                    <tr class="bg-black text-white w-full text-2xl">
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Salario</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                    @foreach ($users as $user)
                    <tr class="text-center text-lg hover:bg-black hover:text-white">
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->privileges}}</td>
                        <td>{{$user->salary}}</td>
                        <td>Seleccionar</td>
                        <td>Editar</td>
                        <td>Eliminar</td>
                    </tr>
                    @endforeach
                </table>
            </div>
    </div>
@endsection 