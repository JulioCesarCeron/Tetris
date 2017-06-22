<?php

namespace App\Http\Controllers\Admin;

use App\ConteudoAula;
use App\Turma;
use App\Materia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConteudoAulasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $conteudoAulas = ConteudoAula::all();
        return view('admin.conteudo-aula.index', compact('conteudoAulas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $materias = Materia::all();
        $turmas   = Turma::all(); 
        $conteudoAula = "";
        $breadcrumb ="create";
        $title = "Adicionar conteúdo";
        return view('admin.conteudo-aula.save', compact('materias', 'turmas', 'conteudoAula', 'breadcrumb', 'title'));
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
     * @param  \App\ConteudoAula  $conteudoAula
     * @return \Illuminate\Http\Response
     */
    public function show(ConteudoAula $conteudoAula){
        $turmas = Turma::all();
        $materias = Materia::all();    
        return view('admin.conteudo-aula.show', compact('conteudoAula', 'turmas', 'materias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConteudoAula  $conteudoAula
     * @return \Illuminate\Http\Response
     */
    public function edit(ConteudoAula $conteudoAula){
        $breadcrumb ="edit";
        $turmas     = Turma::all();
        $materias   = Materia::all();
        $title      = 'Editar conteúdo'; 
        return view('admin.conteudo-aula.save', compact('conteudoAula', 'breadcrumb', 'turmas', 'materias', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConteudoAula  $conteudoAula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConteudoAula $conteudoAula){
        $conteudoAula->fill(array(
                            'professor_id'  => $request->get('professor_id'),
                            'turma_id'      => $request->get('turma_id'),
                            'materia_id'    => $request->get('materia_id'),
                            'data_conteudo' => $request->get('data_conteudo'),
                            'conteudo_aula' => $request->get('conteudo_aula')));
        $conteudoAula->save();
        return redirect()->route('admin.conteudo-aula.index')->with('status', 'Conteúdo atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConteudoAula  $conteudoAula
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConteudoAula $conteudoAula){
        $conteudoAula->delete();
        return redirect()->route('admin.conteudo-aula.index')->with('remove', 'Conteúdo removido!');
    }
}
