<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeshsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meshs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mes_name', 255)->nullable();
            $table->string('mes_res_cas', 255)->nullable();
            $table->string('mes_res_ocas')->nullable();
            $table->string('mes_cod_career')->nullable();
            $table->string('mes_title')->nullable();
            $table->string('mes_itinerary')->nullable();
            $table->integer('mes_number_matter')->nullable();
            $table->integer('mes_number_period')->nullable();
            $table->integer('mes_number_matter_homologate')->nullable();
            $table->date('mes_creation_date')->nullable();
            $table->string('mes_acronym', 3)->nullable();
            $table->integer('anio')->nullable();
            $table->string('mes_description', 255)->nullable();

            $table->integer('mes_modality_id')->unsigned();
            $table->foreign('mes_modality_id')->references('id')->on('catalogs');

            $table->integer('type_calification_id')->unsigned();
            $table->foreign('type_calification_id')->references('id')->on('type_califications');

            $table->integer('level_edu_id')->unsigned();
            $table->foreign('level_edu_id')->references('id')->on('education_levels');

            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meshs');
    }
}
