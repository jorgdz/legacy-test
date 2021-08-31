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
            $table->increments('id'); //PK
            $table->integer('course_id')->unsigned(); //FK
            $table->float('final_note', 8, 4);
            $table->string('observation', 255)->nullable();
            $table->integer('num_fouls')->unsigned();
            $table->integer('matter_status_id')->unsigned(); //FK
            $table->integer('status_id')->unsigned(); //FK
            // $table->foreign('status_id')->references('id')->on('status');
            // $table->foreign('course_id')->references('id')->on('courses');// EC
            // $table->foreign('matter_status_id')->references('id')->on('matter_status');//education_levels  JS        


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
