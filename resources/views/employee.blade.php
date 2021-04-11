@extends('layouts.page')
@section('content')

    <!--home-->
    <div class="w-screen h-screen flex flex-col ">
        <!--botones adicionales-->

        <a  href="{{ route('empleados.create') }}"
            onclick="event.preventDefault();
            document.getElementById('add-form').submit();"
            class="text-blue-600 text-center text-2xl font-bold p-1 px-3 absolute m-4 border-2 border-blue-600 rounded-full">
            Crear Empleado
        </a>
        <form id="add-form" action="{{ route('empleados.create') }}" method="GET">
            @csrf
        </form>

        <x-logout-button/>

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
                    </tr>
                    @foreach ($users as $user)
                    <tr class="text-center text-lg hover:bg-black hover:text-white">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->user_type }}</td>
                        <td>{{ $user->salary }}</td>
                        <td>
                            <form action="{{ route('empleados.edit', $user) }}" method="GET">
                            @csrf
                            <input 
                                type="submit"
                                value="Editar"
                                class="p-2 rounded-lg bg-blue-600 cursor-pointer"
                                >
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('empleados.destroy', $user) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input 
                                type="submit"
                                value="Eliminar"
                                onclick="return confirm('Desea dar de baja a {{$user->name}}')"
                                class="p-2 rounded-lg bg-red-600 cursor-pointer"
                                >
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
    </div>
@endsection 