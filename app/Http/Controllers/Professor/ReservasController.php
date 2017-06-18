<?php

namespace App\Http\Controllers\Professor;

use App\Reserva;
use App\Turma;
use App\Materia;
use App\ItemReserva;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservaFormRequest;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $reservas = Reserva::paginate(15);
        return view('professor.reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $title      = 'Nova Reserva';
        $avaliacao  = '';
        $turmas     = Turma::all();
        $materias   = Materia::where('professor_user_id', \Auth::user()->id)->get();
        $itens      = ItemReserva::all();
        return view('professor.reservas.save', compact('title', 'reservas', 'turmas', 'materias', 'itens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservaFormRequest $request) {

        $teste = Reserva::where('itemReserva_id', $request->get('itemReserva_id'))->where('data_reserva', $request->get('data_reserva'));

        var_dump($teste);

        die();


        $reserva = new Reserva(array(
                        'itemReserva_id'    => $request->get('itemReserva_id'),
                        'professor_user_id' => $request->get('professor_user_id'),
                        'turma_id'          => $request->get('turma_id'),
                        'materia_id'        => $request->get('materia_id'),
                        'data_reserva'      => $request->get('data_reserva'),
                    ));
        $reserva->save();
        return redirect()->route('professor.reservas.index')->with('status', 'Reserva criada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserva $reserva)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserva $reserva)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserva $reserva) {
        $reserva->delete();
        return redirect()->route('professor.reservas.index')->with('remove', 'Reserva removida!');
    }
}
