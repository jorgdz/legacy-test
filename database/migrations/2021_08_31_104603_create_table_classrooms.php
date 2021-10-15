<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClassrooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cl_name', 255);
            $table->bigInteger('cl_cap_max')->nullable();
            $table->string('cl_acronym', 4)->nullable();
            $table->string('cl_description', 255)->nullable();


            $table->bigInteger('campus_id')->unsigned();
            $table->foreign('campus_id')->references('id')->on('campus');

            $table->bigInteger('classroom_type_id')->unsigned();
            $table->foreign('classroom_type_id')->references('id')->on('classroom_types');

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
        Schema::dropIfExists('classrooms');
    }
}
