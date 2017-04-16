<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model {

	protected $guarded = ['id'];

    protected $fillable = [
    	'serie', 'turma'
    ];

    public function turmaAluno() {
    	return $this->hasMany('App\TurmaAluno');
    }

    // public function alunos() {
    //     return $this->hasManyThrough('App\TurmaAluno', 'App\User');
    // }

    public function users() {
        return $this->belongsToMany('App\User', 'turma_alunos', 'turma_id', 'user_id');
    }

}
