<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class TurmaForm extends Form {


    public function buildForm() {
        $this
            ->add('serie', 'text', ['rules' => 'required'])
            ->add('turma', 'text', ['rules' => 'required']);
    }
}
