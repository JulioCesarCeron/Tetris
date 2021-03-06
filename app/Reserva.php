<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model {
    protected $fillable = [
    	'itemReserva_id', 'professor_user_id', 'turma_id', 'materia_id', 'data_reserva', 'title', 'url', 'class', 'start', 'end'
    ];

    public function item(){
    	return $this->belongsTo('App\ItemReserva', 'itemReserva_id');
    }

    public function materia() {
    	return $this->belongsTo('App\Materia');
    }

    public function turma() {
    	return $this->belongsTo('App\Turma');
    }

    public function professor(){
    	return $this->belongsTo('App\User', 'professor_user_id');
    }
}
