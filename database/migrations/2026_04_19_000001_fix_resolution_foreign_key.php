<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixResolutionForeignKey extends Migration
{
    public function up()
    {
        Schema::table('resolution', function (Blueprint $table) {
            $table->dropForeign(['id_resolution_type']);
        });
    }

    public function down()
    {
        Schema::table('resolution', function (Blueprint $table) {
            $table->foreign('id_resolution_type')->references('id')->on('resolution_type');
        });
    }
}