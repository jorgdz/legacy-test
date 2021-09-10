<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_records', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');

            $table->integer('education_level_id')->unsigned();
            $table->foreign('education_level_id')->references('id')->on('education_levels');

            $table->integer('pensum_id')->unsigned();
            $table->foreign('pensum_id')->references('id')->on('pensums');
            
            $table->integer('type_student_id')->unsigned();
            $table->foreign('type_student_id')->references('id')->on('type_students');

            $table->integer('period_id')->unsigned();
            $table->foreign('period_id')->references('id')->on('periods');

            $table->integer('economic_group_id')->unsigned();
            $table->foreign('economic_group_id')->references('id')->on('economic_groups');
            
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
        Schema::dropIfExists('student_records');
    }
}
