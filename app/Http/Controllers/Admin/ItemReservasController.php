<?php

namespace App\Http\Controllers\Admin;

use App\ItemReserva;
use App\ItemReserva;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $itemsReservas = ItemReserva::paginate(10);
        return view('admin.itens_reserva.index',compact('itemsReservas'));
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
     * @param  \App\ItemReserva  $itemReserva
     * @return \Illuminate\Http\Response
     */
    public function show(ItemReserva $itemReserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemReserva  $itemReserva
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemReserva $itemReserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemReserva  $itemReserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemReserva $itemReserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemReserva  $itemReserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemReserva $itemReserva)
    {
        //
    }
}
