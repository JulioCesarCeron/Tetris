<?php

namespace App\Http\Controllers\Admin;

use App\Turma;
use App\User;
use App\TurmaAluno;
use App\Forms\TurmaAlunoForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Controllers\Admin\TurmasControllers;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Http\Requests\AdicionaAlunoFormRequest;

class TurmaAlunosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $turmaAluno = TurmaAluno::paginate(20);
        return view('admin.turmas.turma-alunos.index',compact('turmaAluno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $form = \FormBuilder::create(TurmaAlunoForm::class, [
            'method' => 'POST',
            'url' => route('admin.turma-alunos.store')
        ]);
        $title = "Nova Turma";
        return view('admin.turmas.turma-alunos.save', compact('form', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormBuilder $formBuilder) {
        $form = $formBuilder->create(TurmaAlunoForm::class);

         // It will automatically use current request, get the rules, and do the validation
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        // Or automatically redirect on error. This will throw an HttpResponseException with redirect
        // $form->redirectIfNotValid();

        $turmaAluno = $form->getFieldValues();

        // var_dump($turmaAluno["turma_id"]);
        // die();


        TurmaAluno::create($form->getFieldValues());
        return redirect()->route('admin.turma-alunos.show', ['id' => $turmaAluno["turma_id"]])->with('status', "Aluno Adicionado!");
        //return redirect()->route('admin.turmas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TurmaAluno  $turmaAluno
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        $turma  = Turma::find($id);
        $turmaAlunos = TurmaAluno::where('turma_id', $id)->get();
        $alunos = $turma->users()->get();
        return view('admin.turmas.turma-alunos.show', compact('turma','alunos','turmaAlunos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TurmaAluno  $turmaAluno
     * @return \Illuminate\Http\Response
     */
    public function edit(TurmaAluno $turmaAluno) {
        $form = \FormBuilder::create(TurmaAlunoForm::class, [
            'method' => 'PUT',
            'url'    => route('admin.turma-alunos.update', ['id' => $turmaAluno->turma_id]),
            'model'  => $turmaAluno
        ]);
        $title = "Editar Turma";
        return view('admin.turmas.turma-alunos.save', compact('form', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TurmaAluno  $turmaAluno
     * @return \Illuminate\Http\Response
     */
    public function update(FormBuilder $formBuilder, TurmaAluno $turmaAluno) {
        $form = $formBuilder->create(TurmaForm::class);
        $turma->fill($form->getFieldValues());
        $turma->save();
        return redirect()->route('admin.turmas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TurmaAluno  $turmaAluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(TurmaAluno $turmaAluno) {
        $turmaAluno->delete();
        return redirect()->route('admin.turma-alunos.show', ['id' => $turmaAluno->turma_id])->with('status', "Aluno(a) Removido!");
    }

    public function novoAluno($id) {
        var_dump($id);
        die();
    }

    public function adiciona($id) {
        $alunos = User::where('type', 'aluno')->get();
        $turma = Turma::find($id);
        return view('admin.turmas.turma-alunos.adiciona', compact('turma', 'alunos'));
    }

    public function adicionaStore(AdicionaAlunoFormRequest $request) {
        $turmaAluno = new TurmaAluno(array(
                        'user_id'  => $request->get('user_id'),
                        'turma_id' => $request->get('turma_id')
                    ));
        $turmaAluno->save();
        return redirect()->route('admin.turma-alunos.show', ['id' => $turmaAluno->turma_id])->with('status', "Aluno(a) Adicionado!");
    }
}
