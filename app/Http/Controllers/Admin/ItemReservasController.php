<?php

namespace App\Http\Controllers\Admin;

use App\ItemReserva;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Forms\ItemReservaForm;
use Kris\LaravelFormBuilder\FormBuilder;

class ItemReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $itemsReservas = ItemReserva::paginate(10);
        return view('admin.itens-reserva.index',compact('itemsReservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $form = \FormBuilder::create(ItemReservaForm::class, [
            'method' => 'POST',
            'url' => route('admin.itens-reserva.store')
        ]);
        $title = "Novo Item para reserva";
        return view('admin.itens-reserva.save', compact('form', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder) {
        $form = $formBuilder->create(ItemReservaForm::class);

        ItemReserva::create($form->getFieldValues());
        return redirect()->route('admin.itens-reserva.index');
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
    public function edit(ItemReserva $itemReserva) {
        var_dump($itemReserva);
        die();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemReserva  $itemReserva
     * @return \Illuminate\Http\Response
     */
    public function update(FormBuilder $formBuilder, ItemReserva $itemReserva) {
        $form = $formBuilder->create(ItemReservaForm::class);
        $itemReserva->fill($form->getFieldValues());
        $itemReserva->save();
        return redirect()->route('admin.itens-reserva.index');
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
