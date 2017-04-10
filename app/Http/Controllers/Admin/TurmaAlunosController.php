<?php

namespace App\Http\Controllers\Admin;

use App\Turma;
use App\TurmaAluno;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Controllers\Admin\TurmasControllers;

class TurmaAlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $turmaAluno = TurmaAluno::paginate(20);
        return view('admin.turma.turma-alunos.index',compact('turmaAluno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
       $form = \FormBuilder::create(TurmaForm::class, [
            'method' => 'POST',
            'url' => route('admin.turmas.turma-alunos.store')
        ]);
        $title = "Nova Turma";
        return view('admin.turmas.create', compact('form', 'title'));
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
     * @param  \App\TurmaAluno  $turmaAluno
     * @return \Illuminate\Http\Response
     */
    public function show(TurmaAluno $turmaAluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TurmaAluno  $turmaAluno
     * @return \Illuminate\Http\Response
     */
    public function edit(TurmaAluno $turmaAluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TurmaAluno  $turmaAluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TurmaAluno $turmaAluno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TurmaAluno  $turmaAluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(TurmaAluno $turmaAluno) {
        $turmaAluno->delete();
        //return redirect('/admin/turmas')->with('status', "aluno Removido " . $turma->id . " id da turma!");
        return redirect()->action('TurmasController@show', ['id' => $turmaAluno->turma_id])->with('status', "Aluno Removido!");
    }
}
