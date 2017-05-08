<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UserForm extends Form {

    public function buildForm() {
        $this
            ->add('name',     'text')
            ->add('email',    'email')
            ->add('type',     'select', ['choices' => ['admin' => 'Administrador', 'professor' => 'Professor'], 'empty_value' => 'Tipo de usuário'])
		  	->add('password', 'password');
    }
}
