<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model {
    protected $fillable = [
    	'materia', 'professor_user_id'
    ];

    public function professor() {
    	return $this->belongsTo('App\User', 'professor_user_id');
    }

    public function horario() {
        //return $this->hasMany('App\Horario', );
        return $this->hasManyThrough('App\Horario', 'App\Turma', 'id');
    }

    public function avaliacao(){
        return $this->hasMany('App\Avaliacao');
    }

}
