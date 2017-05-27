<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class HorarioForm extends Form
{
    public function buildForm() {
         $this
            ->add('turma_id',   'number')
			->add('seg_per_1',  'number')
			->add('seg_per_2',  'number')
			->add('seg_per_3',  'number')
			->add('seg_per_4',  'number')
			->add('ter_per_1',  'number')
			->add('ter_per_2',  'number')
			->add('ter_per_3',  'number')
			->add('ter_per_4',  'number')
			->add('quar_per_1', 'number')
			->add('quar_per_2', 'number')
			->add('quar_per_3', 'number')
			->add('quar_per_4', 'number')
			->add('quin_per_1', 'number')
			->add('quin_per_2', 'number')
			->add('quin_per_3', 'number')
			->add('quin_per_4', 'number')
			->add('sex_per_1',  'number')
			->add('sex_per_2',  'number')
			->add('sex_per_3',  'number')
			->add('sex_per_4',  'number');
    }
}
