<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(TurmasTableSeeder::class);
        $this->call(ItemReservaTableSeeder::class);
        $this->call(MateriasTableSeeder::class);
        $this->call(HorariosTableSeeder::class);
    }
}
