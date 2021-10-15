<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePersonEducations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_educations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('pers_edu_graduation_date')->nullable();
            $table->float('pers_edu_calification', 8, 4)->nullable();
            $table->string('pers_edu_observation')->nullable();

            $table->bigInteger('institute_id')->unsigned();
            $table->foreign('institute_id')->references('id')->on('institutes');

            $table->bigInteger('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('catalogs');

            $table->bigInteger('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons');

            $table->bigInteger('type_education_id')->unsigned();
            $table->foreign('type_education_id')->references('id')->on('type_education');

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
        Schema::dropIfExists('person_educations');
    }
}
