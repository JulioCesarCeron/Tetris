<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("itemReserva_id");
            $table->integer('professor_user_id');
            $table->integer("turma_id");
            $table->integer("materia_id");
            $table->date("data_reserva");
            $table->string("title");
            $table->string("url");
            $table->string("class");
            $table->string("start");
            $table->string("end");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');
    }
}
