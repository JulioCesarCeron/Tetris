<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class MateriaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('materia', 'text')
            ->add('professor_user_id', 'number');
    }
}
