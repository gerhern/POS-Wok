@extends('layouts.page')
@section('content')
    {{-- Contenedor principal --}}
    <div class="w-full h-full flex flex-row flex-wrap">


        {{-- datos de provedor seleccionado --}}
        <div class="flex flex-col flex-grow w-full h-2/3 border-b border-blue-400">

            <x-add-button addition="proveedores"
            class="text-green-600 text-lg font-bold py-1 px-4  m-4 border-2 border-green-600 rounded-3xl self-start" />
            <x-logout-button/>

            <h2 class="text-4xl text-center my-4">Citas de Proveedores</h2>
            {{-- citas del dia de hoy --}}
            <div class="w-full h-full  border-b border-blue-400 flex flex-col">
            <span class="bg-blue-200 px-2 absolute -mt-4 -ml-px rounded-3xl">Citas de hoy</span>
                <table class="w-4/5 mx-auto border border-black my-2 text-center ">
                    <tr class="text-xl bg-black text-white h-5">
                        <th>Proveedor</th>
                        <th>Hora</th>
                        <th>Ver # Orden</th>
                        <th>Cita</th>
                        <th>&nbsp;</th>
                        <th>&nbsp;</th>
                    </tr>
                    @if ($todayAppointments !=null)
                        @foreach ($todayAppointments as $app)
                            <tr class="text-md">
                                <td>{{ $app->supplier->name }}</td>
                                <td>{{ $app->hour }}</td>
                                <td>{{ $app->order->id }}</td>
                                @if($app->appointmentStatus == 'Pendiente')
                                    <td class="bg-green-500 font-semibold">{{ $app->appointmentStatus }}</td>
                                    <td class="font-semibold">Recibir</td>
                                @elseif ($app->appointmentStatus == 'Recibido')
                                    <td class="bg-blue-500 font-semibold">{{ $app->appointmentStatus }}</td>
                                    <td class="text-gray-400 font-semibold">Recibir</td>
                                @else
                                    <td class="bg-red-600 font-semibold">{{ $app->appointmentStatus }}</td>
                                    <td class="text-gray-400 font-semibold">Recibir</td>
                                @endif
                                <td>
                                    <a href="{{ route('citas.show', $app) }}" class="font-bold border-2 border-black px-2 rounded hover:bg-black hover:text-white">
                                    Ver
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <td colspan="6" rowspan="5" class="text-3xl">No Hay Citas</td>
                            </tr>
                    @endif
                    
                </table>
                @if ($todayAppointments !=null)
                    {{ $todayAppointments->links() }}
                @endif
                
            <x-add-button addition="citas" class="text-blue-600 text-lg font-bold py-1 px-4  m-4 border-2 border-blue-600 rounded-3xl self-center"/>
            </div>
        </div>{{--fin de hoy --}}

        {{-- citas de la semana --}}
        <div class="w-2/4 h-1/3  border border-blue-400 ">
            <span class="bg-blue-200 px-2 absolute -mt-4 -ml-px rounded-3xl">Esta semana</span>
            <table class="w-4/5 h-4/5 mx-auto border border-black my-2 text-center">
                 <tr class="text-xl bg-black text-white h-5">
                     <th>Proveedor</th>
                     <th colspan="2">Cita</th>
                     <th>&nbsp;</th>
                 </tr>
                 @if ($weekAppointments !=null)
                    @foreach ($weekAppointments as $app)
                        <tr class="text-md">
                            <td>{{ $app->supplier->name}}</td>
                            <td>{{ $app->appointmentWeek }}</td>
                            <td>{{ $app->hour }}</td>
                            <td>
                                <a href="{{ route('citas.show', $app->id) }}" class="font-bold border-2 border-black px-2 rounded hover:bg-black hover:text-white">
                                Ver
                                </a>
                            </td>
                        </tr>
                    @endforeach
                 @else
                        <tr>
                            <td colspan="4" rowspan="5" class="text-3xl">No Hay Citas</td>
                        </tr>
                 @endif
                 
            </table>

            @if ($weekAppointments !=null)
                {{ $weekAppointments->links() }}
            @endif
        </div>{{-- fin de semana --}}

        {{-- historico de citas (limitado a 8) --}}
        <div class="w-2/4 h-1/3  border border-blue-400 ">
            <span class="bg-blue-200 px-2 absolute -mt-4 -ml-px rounded-3xl">Todas las citas</span>
           <table class="w-4/5 h-4/5 mx-auto border border-black my-2 text-center">
                <tr class="text-xl bg-black text-white h-5">
                    <th>Proveedor</th>
                    <th colspan="2">Cita</th>
                    <th>&nbsp;</th>
                </tr>
                @if ($allAppointments !=null)
                    @foreach ($allAppointments as $app)
                    <tr class="text-md">
                        <td>{{ $app->supplier->name }}</td>
                        <td colspan="2">{{ $app->appAll }}</td>
                        <td>
                            <a href="{{ route('citas.show', $app->id) }}" class="font-bold border-2 border-black px-2 rounded hover:bg-black hover:text-white">
                            Ver
                            </a>
                        </td>
                    </tr>
                        
                    @endforeach
                @else
                    <tr>
                        <td colspan="4" rowspan="5" class="text-3xl">No Hay Citas</td>
                    </tr>
                @endif
           </table>
           @if ($allAppointments !=null)
                {{ $allAppointments->links() }}
            @endif
        </div>

    </div>
@endsection