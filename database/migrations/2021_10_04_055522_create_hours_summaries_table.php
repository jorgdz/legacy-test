<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoursSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hours_summaries', function (Blueprint $table) {
            //resumen de horas
            $table->bigIncrements('id');

            $table->bigInteger('collaborator_id')->unsigned();
            $table->foreign('collaborator_id')->references('id')->on('collaborators');
            $table->bigInteger('hs_classes')->unsigned(); //horas de clases
            $table->bigInteger('hs_classes_examns_preparation')->unsigned(); //preparacion de clases y departamentos
            $table->bigInteger('hs_tutoring')->unsigned(); //horas de tutorias
            $table->bigInteger('hs_bonding')->unsigned(); //horas de vinculacion
            $table->bigInteger('hs_academic_management')->unsigned(); //gestion academica
            $table->bigInteger('hs_research')->unsigned(); //horas de investigacion
            $table->bigInteger('hs_total')->unsigned(); //total de horas

            $table->bigInteger('period_id')->unsigned();
            $table->foreign('period_id')->references('id')->on('periods');

            $table->bigInteger('education_level_id')->unsigned();
            $table->foreign('education_level_id')->references('id')->on('education_levels');

            $table->bigInteger('requisition_id')->nullable();

            //  $table->bigInteger('collaborator_hour_id')->unsigned();
            //  $table->foreign('collaborator_hour_id')->references('id')->on('collaborator_hours');

            $table->bigInteger('status_id')->unsigned();
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
        Schema::dropIfExists('hours_summaries');
    }
}
