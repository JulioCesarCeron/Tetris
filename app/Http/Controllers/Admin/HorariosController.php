<?php

namespace App\Http\Controllers\Admin;

use App\Horario;
use App\Materia;
use App\Turma;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\HorarioFormRequest;


class HorariosController extends Controller {
    public $dias = array("dom_per", "seg_per", "ter_per", "quar_per", "quin_per", "sex_per", "sab_per");
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $horarios = Horario::with('turma')->get();
        return view('admin.horarios.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $dias   =  $this->dias;
        $turmas = Turma::all();
        $materias = Materia::all();
        return view('admin.horarios.save', compact('materias', 'dias', 'turmas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HorarioFormRequest $request) {
        $horario = new Horario(array(
            'turma_id'   => $request->get('turma_id'),
            'seg_per_1'  => $request->get('seg_per_1'),
            'seg_per_2'  => $request->get('seg_per_2'),
            'seg_per_3'  => $request->get('seg_per_3'),
            'seg_per_4'  => $request->get('seg_per_4'),
            'ter_per_1'  => $request->get('ter_per_1'),
            'ter_per_2'  => $request->get('ter_per_2'),
            'ter_per_3'  => $request->get('ter_per_3'),
            'ter_per_4'  => $request->get('ter_per_4'),
            'quar_per_1' => $request->get('quar_per_1'),
            'quar_per_2' => $request->get('quar_per_2'),
            'quar_per_3' => $request->get('quar_per_3'),
            'quar_per_4' => $request->get('quar_per_4'),
            'quin_per_1' => $request->get('quin_per_1'),
            'quin_per_2' => $request->get('quin_per_2'),
            'quin_per_3' => $request->get('quin_per_3'),
            'quin_per_4' => $request->get('quin_per_4'),
            'sex_per_1'  => $request->get('sex_per_1'),
            'sex_per_2'  => $request->get('sex_per_2'),
            'sex_per_3'  => $request->get('sex_per_3'),
            'sex_per_4'  => $request->get('sex_per_4'),
        ));
        $horario->save();
        return redirect()->route('admin.horarios.index')->with('status', 'Horário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        $horario = Horario::find($id);
        $dias = $this->dias;
        return view('admin.horarios.show', compact('dias', 'horario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit(Horario $horario) {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
