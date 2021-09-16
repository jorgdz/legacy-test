<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pers_identification', 25)->nullable();
            $table->string('pers_firstname')->nullable();
            $table->string('pers_secondname')->nullable();
            $table->string('pers_first_lastname')->nullable();
            $table->string('pers_second_lastname')->nullable();
            $table->string('pers_gender')->nullable();
            $table->date('pers_date_birth')->nullable();
            $table->string('pers_direction')->nullable();
            $table->string('pers_phone_home')->nullable();
            $table->string('pers_cell')->nullable();
            $table->integer('pers_num_child')->nullable();
            $table->string('pers_profession')->nullable();
            $table->integer('pers_num_bedrooms')->nullable();
            $table->string('pers_study_reason',255)->nullable();
            $table->integer('pers_num_taxpayers_household')->nullable();//contribuyentes en el hogar
            $table->boolean('pers_has_vehicle')->nullable();

            $table->integer('type_religion_id')->unsigned();
            $table->foreign('type_religion_id')->references('id')->on('type_religions');

            $table->integer('status_marital_id')->unsigned();
            $table->foreign('status_marital_id')->references('id')->on('status_marital');

            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');

            $table->integer('current_city_id')->unsigned();
            $table->foreign('current_city_id')->references('id')->on('cities');

            $table->integer('sector_id')->unsigned();
            $table->foreign('sector_id')->references('id')->on('sectors');

            $table->integer('type_identification_id')->unsigned();
            $table->foreign('type_identification_id')->references('id')->on('type_identifications');

            $table->integer('ethnic_id')->unsigned();
            $table->foreign('ethnic_id')->references('id')->on('ethnics');

            $table->bigInteger('vivienda_id')->unsigned();
            $table->foreign('vivienda_id')->references('id')->on('catalogs');

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
        Schema::dropIfExists('persons');
    }
}
