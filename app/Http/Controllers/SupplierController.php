<?php

namespace App\Http\Controllers;

use App\Models\{Appointment, Supplier};
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weekAppointments=[
            'lastDays' => date("d-m-Y",strtotime(date("d-m-Y"). "- 7 days")),
            'nextDays' => date("d-m-Y",strtotime(date("d-m-Y"). "+ 7 days")),
        ];

        $areEmpty = [
            'week' => Appointment::whereBetween('appointment_date',[$weekAppointments['lastDays'], $weekAppointments['nextDays']])
                                ->where('status' , 'Activo')
                                ->get()
                                ->isEmpty(),

            'all' => Appointment::where('status' , 'Activo')
                                ->latest()
                                ->simplePaginate(8)
                                ->isEmpty(),

            'today' => Appointment::where('status' , 'Activo')
                                ->where('appointment_date', date('Y-m-d'))
                                ->latest()
                                ->get()
                                ->isEmpty()
        ];

        $appointments = [
            'week' => Appointment::whereBetween('appointment_date',[$weekAppointments['lastDays'], $weekAppointments['nextDays']])
                                ->where('status' , 'Activo')
                                ->get(),

            'all' => Appointment::where('status' , 'Activo')
                                ->latest()
                                ->simplePaginate(8),

            'today' => Appointment::where('status' , 'Activo')
                                ->where('appointment_date', date('Y-m-d'))
                                ->latest()
                                ->get()
        ];

        //dd($areEmpty);
        
        return view('supplier.supplierIndex', [
            'allAppointments' => $areEmpty['all']?null:$appointments['all'],
            'weekAppointments' => $areEmpty['week']?null:$appointments['week'],
            'todayAppointments' => $areEmpty['today']?null:$appointments['today']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
