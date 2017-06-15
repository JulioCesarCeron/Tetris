<?php

namespace App\Http\Controllers\Professor;

use App\Nota;
use App\User;
use App\Turma;
use App\Materia;
use App\Avaliacao;
use App\TurmaAluno;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NotaFormRequest;

class NotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $mat        = Materia::all();
        $avaliacoes = Avaliacao::where('professor_id', \Auth::user()->id)->get();   
        $route      = "inserir";
        return view('professor.notas.avaliacoes', compact('mat', 'avaliacoes', 'route'));
    }

    public function verNotas() {
        $turmas = Avaliacao::where('professor_id', \Auth::user()->id)->distinct()->select('turma_id')->get();
        return view('professor.notas.turma-notas', compact('turmas'));
    }

    public function verNotasAlunos($turma_id) {
        $turma  = Turma::find($turma_id);
        $alunos  = $turma->users()->get();
        $materia = User::find(\Auth::user()->id)->materias->first();
        $avaliacoes = Avaliacao::where('turma_id', $turma_id)->get();
        return view('professor.notas.alunos-ver-notas', compact('alunos', 'avaliacoes', 'materia', 'turma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title = "Adicionar Nota";
        return view('professor.notas.save', compact('title'));
    }


    public function adicionaNota($avaliacao_id, $aluno_id){
        $title      = "Adicionar nota";
        $avaliacao  = Avaliacao::find($avaliacao_id);
        $breadcrumb = "create";
        $aluno      = User::find($aluno_id);
        return view('professor.notas.save', compact('title', 'avaliacao', 'breadcrumb', 'aluno'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotaFormRequest $request) {
        $nota = new Nota(array(
                            'avaliacao_id'  => $request->get('avaliacao_id'),
                            'aluno_user_id' => $request->get('aluno_user_id'),
                            'nota'          => $request->get('nota'),
                        ));
        $nota->save();

        $avaliacao = Avaliacao::find($request->get('avaliacao_id'));
        $turma  = Turma::find($avaliacao->turma_id);
        $alunos = $turma->users()->get(); 
        return redirect()->route('professor.notas.show', ['avaliacao_id' => $request->get('avaliacao_id')])->with('status', 'Nota Adicionada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show($avaliacao_id){
        $avaliacao = Avaliacao::find($avaliacao_id);
        $alunos    = Turma::find($avaliacao->turma_id)->users()->get();
        return view('professor.notas.alunos', compact('alunos', 'avaliacao'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        //
    }
}
