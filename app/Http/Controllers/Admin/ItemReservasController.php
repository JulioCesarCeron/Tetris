<?php

namespace App\Http\Controllers\Admin;

use App\ItemReserva;
use App\Forms\ItemReservaForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;


class ItemReservasController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $itens = ItemReserva::paginate(5);
        return view('admin.item-reserva.index', compact('itens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $form = \FormBuilder::create(ItemReservaForm::class, [
            'method' => 'POST',
            'url' => route('admin.item-reserva.store')
        ]);
        $title = "Novo Item para reserva";
        return view('admin.item-reserva.save', compact('form', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder) {
        $form = $formBuilder->create(ItemReservaForm::class);
         // It will automatically use current request, get the rules, and do the validation
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        ItemReserva::create($form->getFieldValues());
        return redirect()->route('admin.item-reserva.index')->with('status', 'Item criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemReserva  $itemReserva
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        $itemReserva = itemReserva::find( $id );
        return view('admin.item-reserva.show', compact('itemReserva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemReserva  $itemReserva
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemReserva $itemReserva) {
        $form = \FormBuilder::create(ItemReservaForm::class, [
        'method' => 'PUT',
        'url'    => route('admin.item-reserva.update', ['id' => $itemReserva->id]),
        'model'  => $itemReserva
        ]);
        $title = "Editar Item";
        return view('admin.item-reserva.save', compact('form', 'title'));
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

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $itemReserva->fill($form->getFieldValues());
        $itemReserva->save();
        return redirect()->route('admin.item-reserva.index')->with('status', 'Item atualizado com sucesso!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemReserva  $itemReserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemReserva $itemReserva) {
        $itemReserva->delete();
        return redirect()->route('admin.item-reserva.index')->with('remove', 'Item removido com sucesso!');
    }
}
