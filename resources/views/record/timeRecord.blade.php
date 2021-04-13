@extends('layouts.page')

@section('content')
<div class="bg-red 400 w-full flex flex-col">

    <x-logout-button/>
    
    <h2 class="text-4xl text-center my-4">Registros de {{ $user->name }}</h2>

    @if (session('error'))
        <div class="w-2/5 mx-auto text-red-600 p-4 bg-red-200 border border-red-600 my-4 text-xl text-center">
            {{ session('error') }}
        </div>
    @endif

    <!--tabla de registros-->
    <div class="w-3/5 mx-auto ">
        <table class="w-full mb-20 border border-black" >
            <tr class="bg-black text-white w-full text-3xl">
                <th>Fecha</th>
                <th>Entrada</th>
                <th>Comida</th>
                <th>Regreso Comida</th>
                <th>Salida</th>
            </tr>
            @foreach ($records as $record)
                <tr class="text-center text-2xl">
                    <td>{{ $record->formatDate }}</td>
                    <td>{{ $record->checkin }}</td>
                    <td>{{ $record->mealout }}</td>
                    <td>{{ $record->mealin }}</td>
                    <td>{{ $record->checkout }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    {{-- Formulario de checada --}}
    <div class="mx-auto ">
        <a  href="{{ route('horarios.store') }}"
            onclick="event.preventDefault();
            document.getElementById('check-form').submit();"
            class=" text-lg font-bold py-1 px-4 m-4 border-2 rounded-3xl">
            Crear Registro
        </a>

        <form id="check-form" action="{{ route('horarios.store') }}" method="POST">
            @csrf
        </form>

    </div>
</div>
@endsection