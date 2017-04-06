<?php

use Illuminate\Database\Seeder;

class TurmasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(\App\Turma::class,10)->create();
    }
}
