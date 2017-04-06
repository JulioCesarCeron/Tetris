<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurmaAluno extends Model {

	protected $guarded = ['id'];

    protected $fillable = [
    	'user_id', 'turma_id'
    ];

    public function turmaAlunos(){
    	return $this->belongsTo('App\Turma');
    }
}
