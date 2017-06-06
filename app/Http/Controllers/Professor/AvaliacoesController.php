<?php

namespace App\Http\Controllers\Professor;

use App\Avaliacao;
use App\Turma;
use App\Materia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AvaliacaoFormRequest;

class AvaliacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $avaliacoes = Avaliacao::all();
        return view('professor.avaliacao.index', compact('avaliacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $breadcrumb = 'create';
        $title      = 'Nova Avaliação';
        $avaliacoes = '';
        $turmas     = Turma::all();
        $materias   = Materia::where('professor_user_id', \Auth::user()->id)->get();
        return view('professor.avaliacao.save', compact('breadcrumb', 'title', 'avaliacoes', 'turmas', 'materias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AvaliacaoFormRequest $request) {
        $avaliacao = new Avaliacao(array(
                            'professor_id'   => $request->get('professor_id'),
                            'data_avaliacao' => $request->get('data_avaliacao'),
                            'materia_id'     => $request->get('materia_id'),
                            'turma_id'       => $request->get('turma_id'),
                            'tipo_avaliacao' => $request->get('tipo_avaliacao'),
                        ));
        $avaliacao->save();
        return redirect()->route('professor.avaliacao.index')->with('status', 'Avaliação criada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function show(Avaliacao $avaliacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Avaliacao $avaliacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avaliacao $avaliacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avaliacao $avaliacao)
    {
        //
    }
}
