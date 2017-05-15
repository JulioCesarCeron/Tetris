<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('turma_id')->unsigned(); 
            $table->integer('seg_per_1');
            $table->integer('seg_per_2');
            $table->integer('seg_per_3');
            $table->integer('seg_per_4');
            $table->integer('ter_per_1');
            $table->integer('ter_per_2');
            $table->integer('ter_per_3');
            $table->integer('ter_per_4');
            $table->integer('quar_per_1');
            $table->integer('quar_per_2');
            $table->integer('quar_per_3');
            $table->integer('quar_per_4');
            $table->integer('quin_per_1');
            $table->integer('quin_per_2');
            $table->integer('quin_per_3');
            $table->integer('quin_per_4');
            $table->integer('sex_per_1');
            $table->integer('sex_per_2');
            $table->integer('sex_per_3');
            $table->integer('sex_per_4');
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
        Schema::dropIfExists('horarios');
    }
}

