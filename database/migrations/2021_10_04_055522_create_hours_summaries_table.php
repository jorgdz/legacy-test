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
             $table->increments('id');

             $table->integer('collaborator_id')->unsigned();
             $table->foreign('collaborator_id')->references('id')->on('collaborators');
             $table->integer('hs_classes')->unsigned();//horas de clases
             $table->integer('hs_classes_examns_preparation')->unsigned();//preparacion de clases y departamentos
             $table->integer('hs_tutoring')->unsigned();//horas de tutorias
             $table->integer('hs_bonding')->unsigned();//horas de vinculacion
             $table->integer('hs_academic_management')->unsigned();//gestion academica
             $table->integer('hs_research')->unsigned();//horas de investigacion
             $table->integer('hs_total')->unsigned();//total de horas
 
             
             $table->integer('collaborator_hour_id')->unsigned();
             $table->foreign('collaborator_hour_id')->references('id')->on('collaborator_hours');
 
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
        Schema::dropIfExists('hours_summaries');
    }
}
