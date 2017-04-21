<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Materia;
use App\Forms\MateriaForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Collective\Html\FormFacade;
use App\Http\Requests\MateriaFormRequest;
use Kris\LaravelFormBuilder\FormBuilder;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $materias = Materia::with('professor')->get();
        return view('admin.materias.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $professors = User::where('type', 'professor')->get();
        $materia = "";
        return view('admin.materias.save', compact('professors', 'materia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriaFormRequest $request) {
        $materia = new Materia(array(
            'materia'           => $request->get('materia'),
            'professor_user_id' => $request->get('professor_user_id')
        ));
        $materia->save();
        return redirect()->route('admin.materias.index')->with('status', 'Matéria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Materia $materia) {
        $professors = User::where('type', 'professor')->get();

        return view('admin.materias.update', compact('materia', 'professors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(FormBuilder $formBuilder, Materia $materia) {
        $form = $formBuilder->create(MateriaForm::class);
        $materia->fill($form->getFieldValues());
        $materia->save();
        return redirect()->route('admin.materias.index');
    }


    // public function update(FormBuilder $formBuilder, User $user) {
    //     $form = $formBuilder->create(UserForm::class);
    //     $user->fill($form->getFieldValues());
    //     $user["password"] = bcrypt($user['password']);
    //     $user->save();
    //     return redirect()->route('admin.users.index');
    // }














    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia) {
        $materia->delete();
        return redirect()->route('admin.materias.index')->with('remove', 'Matéria removida!');
    }
}
