<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(\App\User::class)->create([
        	'email' => 'admin@user.com',
            'type'  => 'admin'
        ]);

        factory(\App\User::class, 25)->create([
            'type'  => 'professor'
        ]);

        factory(\App\User::class, 25)->create([
            'type'  => 'aluno'
        ]);
    }
}
