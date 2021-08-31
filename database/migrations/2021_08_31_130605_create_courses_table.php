<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('max_capacity');

            $table->integer('matter_id')->unsigned();
            //$table->foreign('matter_id')->references('id')->on('matters');

            $table->integer('parallel_id')->unsigned();
            //$table->foreign('parallel_id')->references('id')->on('parallels');

            $table->integer('classroom_id')->unsigned();
            //$table->foreign('classroom_id')->references('id')->on('classrooms');
            
            $table->integer('modality_id')->unsigned();
            //$table->foreign('modality_id')->references('id')->on('modalities');

            $table->integer('hourhand_id')->unsigned();
            $table->foreign('hourhand_id')->references('id')->on('hourhands');

            $table->integer('calification_model_id')->unsigned();
            $table->foreign('calification_model_id')->references('id')->on('calification_models');

            $table->integer('course_student_id')->unsigned();
            //$table->foreign('course_student_id')->references('id')->on('course_student');

            $table->integer('period_id')->unsigned();
            $table->foreign('period_id')->references('id')->on('periods');
            
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
        Schema::dropIfExists('courses');
    }
}
