<?php

namespace App\Http\Controllers\Professor;

use App\Presenca;
use App\Turma;
use App\Materia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
