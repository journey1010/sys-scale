<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalIdentificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_identification', function (Blueprint $table) {

            $table->increments('id');
            $table->string('photo_path')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('modular_code')->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('birth_id_department')->unsigned()->nullable();
                $table->foreign('birth_id_department')->references('id')->on('department');
            $table->integer('birth_id_province')->unsigned()->nullable();
                $table->foreign('birth_id_province')->references('id')->on('province');
            $table->integer('birth_id_district')->unsigned()->nullable();
                $table->foreign('birth_id_district')->references('id')->on('district');
            $table->string('address')->nullable();
            $table->integer('home_id_department')->unsigned()->nullable();
                $table->foreign('home_id_department')->references('id')->on('department');
            $table->integer('home_id_province')->unsigned()->nullable();
                $table->foreign('home_id_province')->references('id')->on('province');
            $table->integer('home_id_district')->unsigned()->nullable();
                $table->foreign('home_id_district')->references('id')->on('district');
            $table->string('phone')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('email')->nullable();
            $table->char('dni', 8)->nullable();
            $table->char('sex', 1)->nullable();
            $table->char('blood_type', 3)->nullable();
            $table->string('employment_regime')->nullable();
            $table->string('pension_regime')->nullable();
            $table->string('pension_system')->nullable();
            $table->date('affiliation_date')->nullable();
            $table->string('cuspp')->nullable();

            $table->string('category')->nullable();
            $table->string('position')->nullable();

            $table->string('essalud')->nullable();
            $table->string('civil_status')->nullable()->nullable();
            $table->string('spouse_name')->nullable()->nullable();
            $table->string('spouse_surname')->nullable()->nullable();

            $table->integer('id_user')->unsigned()->nullable();
                $table->foreign('id_user')->references('id')->on('users');

            $table->timestamps();

            //Hijos y padres en otras tablas
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personal_identification', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropForeign(['birth_id_department']);
            $table->dropForeign(['birth_id_province']);
            $table->dropForeign(['birth_id_district']);
            $table->dropForeign(['home_id_department']);
            $table->dropForeign(['home_id_province']);
            $table->dropForeign(['home_id_district']);
        });

        Schema::dropIfExists('personal_identification');
    }
}

//TODO: Cambiar migración para reflejar comportamiento de nuevas vistas