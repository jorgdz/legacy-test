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

            $table->bigInteger('course_id')->nullable()->unsigned();
            $table->bigInteger('student_record_id')->unsigned();
            $table->float('final_note', 8, 4);
            $table->string('observation', 255)->nullable();
            $table->bigInteger('num_fouls')->unsigned();
            $table->bigInteger('subject_status_id')->unsigned();           
            $table->bigInteger('subject_id')->unsigned();      
            $table->bigInteger('period_id')->unsigned();
            $table->bigInteger('approval_status')->unsigned();
            $table->bigInteger('approval_reason_id')->unsigned();
            $table->bigInteger('status_id')->unsigned();

            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('approval_status')->references('id')->on('status');
            $table->foreign('student_record_id')->references('id')->on('student_records');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('subject_status_id')->references('id')->on('subject_status');        
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->foreign('approval_reason_id')->references('id')->on('catalogs');
            $table->foreign('period_id')->references('id')->on('periods');        

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
