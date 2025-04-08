<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliationDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliation_document', function (Blueprint $table) {
            $table->increments('id');
            $table->text('foto_size_carnet')->nullable();
            $table->text('path_foto_size_carnet')->nullable();
            $table->text('job_app')->nullable();
            $table->text('path_job_app')->nullable();
            $table->text('home_certificate')->nullable();
            $table->text('path_home_certificate')->nullable();
            $table->text('presentatio_document')->nullable();
            $table->text('path_presentatio_document')->nullable();
            $table->text('declaration_sworn_goods')->nullable();
            $table->text('path_declaration_sworn_goods')->nullable();
            $table->text('health_certificate')->nullable();
            $table->text('path_health_certificate')->nullable();
            $table->text('judicial_certificate')->nullable();
            $table->text('path_judicial_certificate')->nullable();
            $table->text('police_certificate')->nullable();
            $table->text('path_police_certificate')->nullable();
            $table->text('birth_certificate')->nullable();
            $table->text('path_birth_certificate')->nullable();
            $table->text('title_nationalized')->nullable();
            $table->text('path_title_nationalized')->nullable();
            $table->text('marriage_certificate_nationality')->nullable();
            $table->text('path_marriage_certificate_nationality')->nullable();
            $table->text('country_visa')->nullable();
            $table->text('path_country_visa')->nullable();
            $table->text('resolution_disability')->nullable();
            $table->text('path_resolution_disability')->nullable();
            $table->text('copy_essalud')->nullable();
            $table->text('path_copy_essalud')->nullable();
            $table->text('document_fap')->nullable();
            $table->text('path_document_fap')->nullable();
            $table->text('cv')->nullable();
            $table->text('path_cv')->nullable();
            $table->text('dni_legalized')->nullable();
            $table->text('path_dni_legalized')->nullable();
            $table->text('marriage_certificate')->nullable();
            $table->text('path_marriage_certificate')->nullable();
            $table->text('notarial_of_coexistence')->nullable();
            $table->text('path_notarial_of_coexistence')->nullable();
            $table->text('children_document')->nullable();
            $table->text('path_children_document')->nullable();
            $table->text('nationality_document')->nullable();
            $table->text('path_nationality_document')->nullable();
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
        Schema::dropIfExists('affiliation_document');
    }
}
