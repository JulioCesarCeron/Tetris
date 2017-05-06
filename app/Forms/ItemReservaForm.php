<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ItemReservaForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('item', 'text')
            ->add('quantidade', 'number')
            ->add('descricao', 'textarea');
    }
}
