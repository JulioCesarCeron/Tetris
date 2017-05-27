<?php

use Illuminate\Database\Seeder;

class ItemReservaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(\App\ItemReserva::class,10)->create();
    }
}
