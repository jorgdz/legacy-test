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
            $table->bigIncrements('id');
            $table->bigInteger('person_id_relative')->unsigned();
            $table->foreign('person_id_relative')->references('id')->on('persons');

            $table->bigInteger('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons');

            $table->bigInteger('type_kinship_id')->unsigned();
            $table->foreign('type_kinship_id')->references('id')->on('catalogs');

            $table->string('rel_description')->nullable();

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
        Schema::dropIfExists('relatives');
    }
}
