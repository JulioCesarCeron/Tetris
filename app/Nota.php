<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model {
    protected $fillable = [
    	'avaliacao_id', 'aluno_user_id', 'nota'
    ];

    public function aluno(){
    	return $this->belongsTo('App\User', 'id');
    }

    public function avaliacao(){
    	return $this->belongsTo('App\Avaliacao');
    }
}
