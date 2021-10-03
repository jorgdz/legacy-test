<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomEducationLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom_education_levels', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('classroom_id')->unsigned();
            $table->foreign('classroom_id')->references('id')->on('classrooms');

            $table->integer('period_id')->unsigned();
            $table->foreign('period_id')->references('id')->on('periods');

            $table->integer('education_level_id')->unsigned(); 
            $table->foreign('education_level_id')->references('id')->on('education_levels');

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
        Schema::dropIfExists('classroom_education_levels');
    }
}
