<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_student', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('course_id')->unsigned();
            $table->float('final_note', 8, 4);
            $table->string('observation', 255)->nullable();
            $table->bigInteger('num_fouls')->unsigned();
            $table->bigInteger('matter_status_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();

            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('matter_status_id')->references('id')->on('subject_status');        

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
        Schema::dropIfExists('course_student');
    }
}
