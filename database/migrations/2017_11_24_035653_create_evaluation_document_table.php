<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_document', function (Blueprint $table) {
            $table->increments('id');

            $table->string('tipo')->nullable();
            $table->date('fecha_emision')->nullable();
            $table->integer('puntaje')->nullable();
            $table->decimal('calificacion')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('informepath')->nullable();
            $table->string('informeurl')->nullable();

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
        //
    }
}
