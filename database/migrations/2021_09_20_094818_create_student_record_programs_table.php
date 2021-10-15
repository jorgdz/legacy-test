<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRecordProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_record_programs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('student_record_id')->unsigned();
            $table->foreign('student_record_id')->references('id')->on('student_records');

            $table->bigInteger('type_student_program_id')->unsigned();
            $table->foreign('type_student_program_id')->references('id')->on('type_student_programs');

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
        Schema::dropIfExists('student_record_programs');
    }
}
