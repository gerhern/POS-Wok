@extends('layouts.page')
@section('content')
    {{-- Contenedor principal --}}
    <div class="w-full h-full flex flex-row flex-wrap">


        {{-- datos de provedor seleccionado --}}
        <div class="flex flex-col flex-grow w-full h-2/3 border-b border-blue-400">
            <x-logout-button/>
            <h2 class="text-4xl text-center my-4">Citas de Proveedores</h2>
        </div>

        {{-- citas del dia de hoy --}}
        <div class="w-1/3 h-1/3  border border-blue-400">
            <span class="bg-blue-200 px-2 absolute -mt-4 rounded-3xl">Hoy</span>
            <table class="w-4/5 h-4/5 mx-auto border border-black my-2 text-center">
                 <tr class="text-xl bg-black text-white">
                     <th>Proveedor</th>
                     <th>Cita</th>
                 </tr>
                 @if ($todayAppointments !=null)
                    @foreach ($todaykAppointments as $app)
                        <tr class="text-md">
                            <td>{{ $app->supplier_id }}</td>
                            <td>{{ $app->appointment_date }}</td>
                        </tr>
                    @endforeach
                 @else
                        <tr>
                            <td colspan="2" rowspan="5">No Hay Citas</td>
                        </tr>
                 @endif
                 
            </table>
        </div>

        {{-- citas de la semana --}}
        <div class="w-1/3 h-1/3  border border-blue-400">
            <span class="bg-blue-200 px-2 absolute -mt-4 rounded-3xl">Esta semana</span>
            <table class="w-4/5 h-4/5 mx-auto border border-black my-2 text-center">
                 <tr class="text-xl bg-black text-white">
                     <th>Proveedor</th>
                     <th>Cita</th>
                 </tr>
                 @if ($weekAppointments !=null)
                    @foreach ($weekAppointments as $app)
                        <tr class="text-md">
                            <td>{{ $app->supplier_id }}</td>
                            <td>{{ $app->appointment_date }}</td>
                        </tr>
                    @endforeach
                 @else
                        <tr>
                            <td colspan="2" rowspan="5">No Hay Citas</td>
                        </tr>
                 @endif
                 
            </table>
        </div>

        {{-- historico de citas (limitado a 50) --}}
        <div class="w-1/3 h-1/3  border border-blue-400 ">
            <span class="bg-blue-200 px-2 absolute -mt-4 rounded-3xl">Todas las citas</span>
           <table class="w-4/5 h-4/5 mx-auto border border-black my-2 text-center">
                <tr class="text-xl bg-black text-white">
                    <th>Proveedor</th>
                    <th>Cita</th>
                </tr>
                @if ($allAppointments !=null)
                    @foreach ($allAppointments as $app)
                        <tr class="text-md">
                            <td>{{ $app->supplier_id }}</td>
                            <td>{{ $app->appointment_date }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">No Hay Citas</td>
                    </tr>
                @endif
           </table>
           {{ $allAppointments->links() }}
        </div>

    </div>
@endsection