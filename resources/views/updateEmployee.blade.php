@extends('layouts.page')
@section('content')
    <!--contenedor-->
    <div class="flex flex-col w-full">

        <x-logout-button/>
        
        <h2 class="text-4xl text-center my-4">Editar de Empleado</h2>

        <!--div de erroeres-->
        @if ($errors->any())
        <div class="w-2/5 mx-auto text-red-600 p-4 bg-red-200 border border-red-600 my-4 text-xl">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <div class="w-1/5 mx-auto p-8 border border-black">

            <!--formulaio de edicion de empleados-->
            <form action="{{ route('empleados.update', $user->id) }}" method="POST" class="flex flex-col justify-evenly items-center">
                @method('PUT')
                @csrf
                <label for="name" class="w-full flex flex-col justify-center ">
                    <span class="text-xl font-extrabold">Nombre Completo</span>
                    <input id="name" type="text" class="font-semibold h-12 text-lg px-4 border-black border-2" name="name" value="{{ $user->name }}"  autocomplete="name" autofocus placeholder="Ej. David Suarez" required minlength="3" maxlength="120">
                </label>

                <label for="privileges" class="w-full flex flex-col justify-center ">
                    <span class="text-xl font-extrabold">Cargo</span>
                    <select id="privileges" class=" font-semibold h-12 text-lg px-4 border-black border-2" name="privileges" required >
                        <option 
                            @if ($user->privileges == 'Admn')
                                selected
                            @endif value="Admn" >Administrador</option>
                        <option 
                            @if ($user->privileges == 'User')
                                selected
                            @endif value="User">Vendedor</option>
                    </select>
                </label>

                <label for="salary" class="w-full flex flex-col justify-center ">
                    <span class="text-xl font-extrabold">Salario Inicial</span>
                    <input id = "salary" type="number" class=" font-semibold h-12 text-lg px-4 border-black border-2" name="salary"  autocomplete="salary" placeholder="Ej. 27.92" value="{{ $user->salary }}" required min="27" max="120" step="0.01">
                </label>
                
                <input type="submit" value="Editar" class="text-lg border-black border-2 rounded-2xl px-8 bg-gray-100 my-4 ">
            </form>
        </div>
        
    </div><!--fin de contenedor-->
@endsection 