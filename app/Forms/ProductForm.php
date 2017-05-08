<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ProductForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name',        'text',     ['rules' => 'required'])
            ->add('description', 'textarea', ['rules' => 'required'])
            ->add('value',       'text',     ['rules' => 'required']);
    }
}
