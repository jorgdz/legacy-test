<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDisabilityPerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disability_person', function (Blueprint $table) {
            $table->bigInteger('person_id')->unsigned();
            $table->bigInteger('type_disability_id')->unsigned();

            $table->foreign('type_disability_id')->references('id')->on('type_disabilities');
            $table->foreign('person_id')->references('id')->on('persons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disability_person');
    }
}
