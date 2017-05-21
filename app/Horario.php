<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model {
    protected $guarded = ['id'];

    protected $fillable = [
    	'turma_id', 
    	'seg_per_1',
    	'seg_per_2',
    	'seg_per_3',
    	'seg_per_4',
    	'ter_per_1',
    	'ter_per_2',
    	'ter_per_3',
    	'ter_per_4',
    	'quar_per_1',
    	'quar_per_2',
    	'quar_per_3',
    	'quar_per_4',
    	'quin_per_1',
    	'quin_per_2',
    	'quin_per_3',
    	'quin_per_4',
    	'sex_per_1',
    	'sex_per_2',
    	'sex_per_3',
    	'sex_per_4',
    ];


    public function turma() {
        return $this->belongsTo('App\Turma');
    }

    public function seg_per_1_materia(){
        return $this->belongsTo('App\Materia', 'seg_per_1');
    }

    public function seg_per_2_materia(){
        return $this->belongsTo('App\Materia', 'seg_per_2');
    }

    public function seg_per_3_materia(){
        return $this->belongsTo('App\Materia', 'seg_per_3');
    }

    public function seg_per_4_materia(){
        return $this->belongsTo('App\Materia', 'seg_per_4');
    }

    public function ter_per_1_materia(){
        return $this->belongsTo('App\Materia', 'ter_per_1');
    }

    public function ter_per_2_materia(){
        return $this->belongsTo('App\Materia', 'ter_per_2');
    }

    public function ter_per_3_materia(){
        return $this->belongsTo('App\Materia', 'ter_per_3');
    }

    public function ter_per_4_materia(){
        return $this->belongsTo('App\Materia', 'ter_per_4');
    }

    public function quar_per_1_materia(){
        return $this->belongsTo('App\Materia', 'quar_per_1');
    }

    public function quar_per_2_materia(){
        return $this->belongsTo('App\Materia', 'quar_per_2');
    }

    public function quar_per_3_materia(){
        return $this->belongsTo('App\Materia', 'quar_per_3');
    }

    public function quar_per_4_materia(){
        return $this->belongsTo('App\Materia', 'quar_per_4');
    }

    public function quin_per_1_materia(){
        return $this->belongsTo('App\Materia', 'quin_per_1');
    }

    public function quin_per_2_materia(){
        return $this->belongsTo('App\Materia', 'quin_per_2');
    }

    public function quin_per_3_materia(){
        return $this->belongsTo('App\Materia', 'quin_per_3');
    }

    public function quin_per_4_materia(){
        return $this->belongsTo('App\Materia', 'quin_per_4');
    }

    public function sex_per_1_materia(){
        return $this->belongsTo('App\Materia', 'sex_per_1');
    }

    public function sex_per_2_materia(){
        return $this->belongsTo('App\Materia', 'sex_per_2');
    }

    public function sex_per_3_materia(){
        return $this->belongsTo('App\Materia', 'sex_per_3');
    }

    public function sex_per_4_materia(){
        return $this->belongsTo('App\Materia', 'sex_per_4');
    }
}
