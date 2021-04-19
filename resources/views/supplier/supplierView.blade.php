<div class="w-full h-full bg-green-400">
    <table class="w-4/5 h-4/5 mx-auto border border-black my-2 text-center">
         <tr class="text-xl bg-black text-white h-5">
             <th>Proveedor</th>
             <th>Dia</th>
             <th>Hora</th>
             <th>#Orden</th>
             <th>&nbsp;</th>
         </tr>
         @if ($todayAppointments !=null)
            @foreach ($todayAppointments as $app)
                <tr class="text-md">
                    <td>{{ $app->supplier->name }}</td>
                    <td colspan="2">{{ $app->hour }}</td>
                </tr>
            @endforeach
         @else
                <tr>
                    <td colspan="3" rowspan="5">No Hay Citas</td>
                </tr>
         @endif
         
    </table>
    @if ($todayAppointments !=null)
        {{ $todayAppointments->links() }}
    @endif
</div>