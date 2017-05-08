<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ItemReservaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('nome_item',  'text', ['rules' => 'required'])
            ->add('quantidade', 'number', ['rules' => 'required'])
            ->add('descricao',  'textarea', ['rules' => 'required']);
    }
}
