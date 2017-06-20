<?php

namespace App\Http\Controllers\Professor;

use App\Presenca;
use App\Turma;
use App\Materia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PresencaFormRequest;

class PresencasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $turmas = Turma::all();
        return view('professor.presencas.index', compact('turmas'));
    }

    public function materias($turma_id){
        $materias = Materia::where('professor_user_id', \Auth::user()->id)->get();
        $turma    = Turma::find($turma_id);
        return view('professor.presencas.materias', compact('materias', 'turma_id', 'turma'));
    }

    public function alunos($turma_id, $materia_id){
        $alunos  = Turma::find($turma_id)->users()->get();
        $turma   = Turma::find($turma_id); 
        $materia = Materia::find($materia_id);
        return view('professor.presencas.alunos', compact('alunos', 'turma_id', 'materia_id', 'materia', 'turma'));
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
    public function store(PresencaFormRequest $request) {
        $nota = new Presenca(array(
                            'materia_id'    => $request->get('materia_id'),
                            'presenca'      => $request->get('presenca'),
                            'turma_id'      => $request->get('turma_id'),
                            'aluno_user_id' => $request->get('aluno_user_id'),
                            'data_presenca' => $request->get('data_presenca'),
                        ));
        $nota->save();
        return redirect()->route('professor.presencas.alunos', ['turma_id' => $request->get('turma_id'), 'materia_id' => $request->get('materia_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Presenca  $presenca
     * @return \Illuminate\Http\Response
     */
    public function show(int $turma_id) {
        $alunos  = Turma::find($turma_id)->users()->get();
        return view('professor.presencas.alunos', compact('alunos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Presenca  $presenca
     * @return \Illuminate\Http\Response
     */
    public function edit(Presenca $presenca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Presenca  $presenca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presenca $presenca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Presenca  $presenca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presenca $presenca)
    {
        //
    }
}
