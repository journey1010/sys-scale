<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAditionalCareerpathTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('aditional_carrerpath', function (Blueprint $table) {
            $table->increments('id');

            $table->string('tipo')->nullable();
            $table->string('denominacion_cargo')->nullable();
            $table->string('motivo_cese')->nullable();
            $table->string('nivel')->nullable();
            $table->string('cargo')->nullable();
            $table->string('dependencia')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_cese')->nullable();
            $table->integer('dias_laborados')->nullable();
            $table->string('observaciones')->nullable();

            $table->integer('id_resolution')->unsigned()->nullable();
            $table->foreign('id_resolution')->references('id')->on('resolution');

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
        Schema::table('addicional_carrerpath', function (Blueprint $table) {
            $table->dropForeign(['id_resolution']);
        });

        Schema::dropIfExists('addicional_carrerpath');
    }
}
