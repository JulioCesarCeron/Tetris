<?php

namespace App\Http\Controllers\Professor;

use App\ConteudoAula;
use App\User;
use App\Materia;
use App\Turma;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConteudoAulaFormRequest;

class ConteudoAulasController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $conteudoAulas = ConteudoAula::where('professor_id', \Auth::user()->id)->get();
        return view('professor.conteudo-aula.index', compact('conteudoAulas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $materias = Materia::where('professor_user_id', \Auth::user()->id)->get();
        $turmas   = Turma::all(); 
        $conteudoAula = "";
        $breadcrumb ="create";
        $title = "Adicionar conteúdo";
        return view('professor.conteudo-aula.save', compact('materias', 'turmas', 'conteudoAula', 'breadcrumb', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConteudoAulaFormRequest $request) {
        $conteudoAula = new ConteudoAula(array(
                            'professor_id'  => $request->get('professor_id'),
                            'turma_id'      => $request->get('turma_id'),
                            'materia_id'    => $request->get('materia_id'),
                            'data_conteudo' => $request->get('data_conteudo'),
                            'conteudo_aula' => $request->get('conteudo_aula'),
                        ));
        $conteudoAula->save();
        return redirect()->route('professor.conteudo-aula.index')->with('status', 'Conteúdo criado com sucessor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConteudoAula  $conteudoAula
     * @return \Illuminate\Http\Response
     */
    public function show(ConteudoAula $conteudoAula) {
        $turmas = Turma::all();
        $materias = Materia::where('professor_user_id', \Auth::user()->id)->get();    
        return view('professor.conteudo-aula.show', compact('conteudoAula', 'turmas', 'materias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConteudoAula  $conteudoAula
     * @return \Illuminate\Http\Response
     */
    public function edit(ConteudoAula $conteudoAula) {
        $breadcrumb ="edit";
        $turmas     = Turma::all();
        $materias   = Materia::where('professor_user_id', \Auth::user()->id)->get();
        $title      = 'Editar conteúdo'; 
        return view('professor.conteudo-aula.save', compact('conteudoAula', 'breadcrumb', 'turmas', 'materias', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConteudoAula  $conteudoAula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConteudoAula $conteudoAula) {
        $conteudoAula->fill(array(
                            'professor_id'  => $request->get('professor_id'),
                            'turma_id'      => $request->get('turma_id'),
                            'materia_id'    => $request->get('materia_id'),
                            'data_conteudo' => $request->get('data_conteudo'),
                            'conteudo_aula' => $request->get('conteudo_aula')));
        $conteudoAula->save();
        return redirect()->route('professor.conteudo-aula.index')->with('status', 'Conteúdo atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConteudoAula  $conteudoAula
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConteudoAula $conteudoAula) {
        $conteudoAula->delete();
        return redirect()->route('professor.conteudo-aula.index')->with('remove', 'Conteúdo removido!');
    }
}
