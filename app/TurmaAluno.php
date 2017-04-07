<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurmaAluno extends Model {

	protected $guarded = ['id'];

    protected $fillable = [
    	'user_id', 'turma_id'
    ];

    public function turmas() {
    	return $this->belongsTo('App\Turma');
    }

    public function usersAlunos() {
    	return $this->belongsTo('App\User', 'id');
    }


}
