<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presenca extends Model {
    protected $fillable = [
    	'materia_id', 'presenca', 'turma_id', 'aluno_user_id'
    ];
}
