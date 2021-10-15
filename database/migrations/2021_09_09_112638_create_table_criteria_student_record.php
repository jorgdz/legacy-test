<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCriteriaStudentRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criteria_student_records', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('qualification', 300)->nullable();

            $table->bigInteger('type_criteria_id')->unsigned();
            $table->foreign('type_criteria_id')->references('id')->on('type_criterias');

            $table->bigInteger('student_record_id')->unsigned();
            $table->foreign('student_record_id')->references('id')->on('student_records');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criteria_student_records');
    }
}
