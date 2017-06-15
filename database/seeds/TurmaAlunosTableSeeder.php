<?php

use Illuminate\Database\Seeder;

class TurmaAlunosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        factory(\App\TurmaAluno::class,20)->create();
    }
}
