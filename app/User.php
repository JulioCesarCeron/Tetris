<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


     public function scopeOfType($query, $type) {
        return $query->where('type', $type);
    }

    /**
     * [isAdmin description]
     * @return boolean [description]
     */
    public function isAdmin(){
        return $this->type === 'admin' ? true : false; 
    }

    /**
     * [isProfessor description]
     * @return boolean [description]
     */
    public function isProfessor(){
        return $this->type === 'professor' ? true : false; 
    }

    /**
     * [isAluno description]
     * @return boolean [description]
     */
    public function isAluno(){
        return $this->type === 'aluno' ? true : false; 
    }


    public function turmaAlunos() {
        return $this->belongsTo('App\TurmaAluno');
    }

    public function turma() {
        return $this->belongsToMany('App\Turma', 'turma_alunos', 'user_id', 'turma_id');
    }

    public function materias() {
        return $this->hasMany('App\Materia', 'professor_user_id');
    }

    public function notas() {
        return $this->hasMany('App\Nota', 'aluno_user_id');
    }

}
