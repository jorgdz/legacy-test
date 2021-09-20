<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatives', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');
            $table->integer('person_id_relative')->unsigned();
            $table->foreign('person_id_relative')->references('id')->on('persons');

            $table->integer('person_id_student')->unsigned();
            $table->foreign('person_id_student')->references('id')->on('persons');
            
            $table->integer('type_kinship_id')->unsigned();
            $table->foreign('type_kinship_id')->references('id')->on('type_kinship');
            
            $table->string('rel_description')->nullable();
           
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
        Schema::dropIfExists('relatives');
    }
}
