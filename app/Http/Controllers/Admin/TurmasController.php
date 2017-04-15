<?php

namespace App\Http\Controllers\Admin;

use App\Turma;
use App\TurmaAluno;
use App\Forms\TurmaForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Kris\LaravelFormBuilder\FormBuilder;

class TurmasController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $turmas = Turma::paginate(20);
        return view('admin.turmas.index',compact('turmas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $form = \FormBuilder::create(TurmaForm::class, [
            'method' => 'POST',
            'url' => route('admin.turmas.store')
        ]);
        $title = "Nova Turma";
        return view('admin.turmas.save', compact('form', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder) {
        $form = $formBuilder->create(TurmaForm::class);
         // It will automatically use current request, get the rules, and do the validation
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        Turma::create($form->getFieldValues());
        return redirect()->route('admin.turmas.index')->with('status', 'Turma criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function edit(Turma $turma) {
        $form = \FormBuilder::create(TurmaForm::class, [
            'method' => 'PUT',
            'url'    => route('admin.turmas.update', ['id' => $turma->id]),
            'model'  => $turma
        ]);
        $title = "Editar Turma";
        return view('admin.turmas.save', compact('form', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function update(FormBuilder $formBuilder, Turma $turma) {
        $form = $formBuilder->create(TurmaForm::class);
        $turma->fill($form->getFieldValues());
        $turma->save();
        return redirect()->route('admin.turmas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turma  $turma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turma $turma) {
        $turma->delete();
        return redirect()->route('admin.turmas.index')->with('status', 'Turma removida!');
    }
}
