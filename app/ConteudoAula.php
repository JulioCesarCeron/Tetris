<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConteudoAula extends Model {
    protected $fillable = [
    	'professor_id', 'turma_id', 'materia_id', 'data_conteudo', 'conteudo_aula'
    ];

    public function professor() {
    	return $this->belongsTo('App\User', 'professor_id');
    }    

    public function materia() {
    	return $this->belongsTo('App\Materia');
    }

    public function turma() {
    	return $this->belongsTo('App\Turma');
    }


}
