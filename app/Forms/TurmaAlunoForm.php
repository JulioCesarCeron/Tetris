<?php

namespace App\Forms;
use App\Http\Controllers\Admin\UsersController;

use Kris\LaravelFormBuilder\Form;

class TurmaAlunoForm extends Form
{
    public function buildForm() {
    	
        $this
	        ->add('user_id', 'number', [
            	'rules' => 'required',
            ])
		  	->add('turma_id', 'number', [
            	'rules' => 'required',
            ]);
    }
}
