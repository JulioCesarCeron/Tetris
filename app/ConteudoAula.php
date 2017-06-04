<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConteudoAula extends Model {
    protected $fillable = [
    	'turma_id', 'materia_id', 'data_conteudo', 'conteudo_aula'
    ];
}
