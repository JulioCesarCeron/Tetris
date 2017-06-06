<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model {

	protected $table = 'avaliacoes';

    protected $fillable = [
    	'professor_id', 'data_avaliacao', 'materia_id', 'turma_id', 'tipo_avaliacao'
    ];
}
