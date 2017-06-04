<?php

namespace App\Http\Controllers\Professor;

use App\ConteudoAula;
use App\User;
use App\Materia;
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
        $materias = User::find(8);
        return view('professor.conteudo-aula.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('professor.conteudo-aula.save');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        var_dump($request);
        die();
        $conteudoAula = new ConteudoAula(array(
                            'turma_id'      => $request->get('turma_id'),
                            'materia_id'    => $request->get('materia_id'),
                            'data_conteudo' => $request->get('data_conteudo'),
                            'conteudo_aula' => $request->get('conteudo_aula'),
                        ));


        //$conteudoAula->save();
        return view('professor.conteudo-aula.index')->with('status', 'Conteúdo criado com sucessor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConteudoAula  $conteudoAula
     * @return \Illuminate\Http\Response
     */
    public function show(ConteudoAula $conteudoAula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConteudoAula  $conteudoAula
     * @return \Illuminate\Http\Response
     */
    public function edit(ConteudoAula $conteudoAula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConteudoAula  $conteudoAula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConteudoAula $conteudoAula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConteudoAula  $conteudoAula
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConteudoAula $conteudoAula)
    {
        //
    }
}
