@extends('layouts.page')
@section('content')

    {{-- Contenedor principal --}}
        <div class="w-full flex flex-col items-center">

            <a  href="{{ route("proveedores.index") }}"
            onclick="event.preventDefault();
            document.getElementById('appointments-form').submit();"
            class="text-purple-600 text-lg font-bold py-1 px-4 self-start absolute m-4 border-2 border-purple-600 rounded-3xl">
            Regresar
        </a>

        <form id="appointments-form" action="{{ route("proveedores.index") }}" method="GET">
            @csrf
        </form>

            <x-logout-button/>
            <h2 class="text-4xl my-4">Cita</h2>

            {{-- Tabla de cita seleccionada --}}
                <div class="w-full h-full flex flex-col">
                    <table class="w-4/5 mx-auto border border-black my-2 text-center">

                        <tr class="text-xl bg-black text-white h-5">
                            <th >Proveedor</th>
                            <th >Fecha</th>
                            <th >Hora</th>
                            <th >Estatus</th>
                            <th> # Orden</th>
                            <th>Estatus de Orden</th>
                        </tr>

                        <tr class="h-12">
                            <td>{{ $appointment->supplier->name }}</td>
                            <td>{{ $appointment->app_all }}</td>
                            <td>{{ $appointment->hour }}</td>
                            @if ($appointment->appointment_status == 'Pendiente' )
                                <td class="bg-green-500 font-semibold">{{ $appointment->appointment_status}}</td>
                            @elseif ($appointment->appointment_status == 'Recibido')
                                <td class="bg-blue-500 font-semibold">{{ $appointment->appointment_status }}</td>
                            @else
                                <td class="bg-red-600 font-semibold">{{ $appointment->appointment_status }}</td>
                            @endif
                            <td>{{ $appointment->order->id }}</td>
                            <td> {{ $appointment->order->status }}</td>
                        </tr>
                        
                        <tr class="text-xl bg-black text-white h-5">
                            <th colspan="3">Item</th>
                            <th>Cantidad</th>
                            <th>Precio Individual</th>
                            <th>Precio Total</th>
                        </tr>

                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>

                        @foreach ($items as $item)
                            <tr>
                                <td colspan="3">{{ $item->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>${{ number_format($item->price*$item->quantity, 2) }}</td>
                                @php
                                    $total += $item->price*$item->quantity
                                @endphp
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="6">&nbsp;</td>
                        </tr>

                        <tr class="text-xl bg-black text-white h-5">
                            <td colspan="3">Factura Total</td>
                            <td colspan="3">${{ number_format($total, 2) }}</td>
                        </tr>

                    </table>
                </div>
            {{-- Fin tabla de cita seleccionada --}}
        </div>
    {{-- Fin de contenedor principal --}}
@endsection