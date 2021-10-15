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
            $table->bigIncrements('id');

            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');

            $table->bigInteger('education_level_id')->unsigned();
            $table->foreign('education_level_id')->references('id')->on('education_levels');

            $table->bigInteger('mesh_id')->unsigned();
            $table->foreign('mesh_id')->references('id')->on('curriculums');
            /* $table->bigInteger('pensum_id')->unsigned();
            $table->foreign('pensum_id')->references('id')->on('pensums'); */

            $table->bigInteger('type_student_id')->unsigned();
            $table->foreign('type_student_id')->references('id')->on('type_students');

            $table->bigInteger('collaborator_id')->unsigned();
            $table->foreign('collaborator_id')->references('id')->on('collaborators');

            $table->bigInteger('economic_group_id')->unsigned();
            $table->foreign('economic_group_id')->references('id')->on('economic_groups');

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
        Schema::dropIfExists('student_records');
    }
}
