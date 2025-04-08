<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationPrimaryDepartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('primary_education', function (Blueprint $table) {

            $table->string('id_country')->nullable();

            $table->string('id_department')->nullable();
            /*$table->foreign('id_department')->references('id')->on('department');*/

            $table->string('id_province')->nullable();
            /*$table->foreign('id_province')->references('id')->on('province');*/

            $table->string('id_district')->nullable();
            /*$table->foreign('id_district')->references('id')->on('district');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('primary_education', function (Blueprint $table) {
            $table->dropForeign(['id_district']);
            $table->dropForeign(['id_province']);
            $table->dropForeign(['id_department']);

        });
    }
}
