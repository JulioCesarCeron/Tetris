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

}
