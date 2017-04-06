<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model {

	protected $guarded = ['id'];

    protected $fillable = [
    	'serie', 'turma'
    ];

    public function alunos() {
    	return $this->hasMany('App\TurmaAluno', 'turma_id');
    }

}
