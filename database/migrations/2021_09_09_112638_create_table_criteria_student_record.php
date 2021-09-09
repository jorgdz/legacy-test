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
            $table->increments('id');

            $table->string('qualification', 300)->nullable();

            $table->integer('criteria_id')->unsigned();
            $table->foreign('criteria_id')->references('id')->on('type_criterias');

            $table->integer('student_record_id')->unsigned();
            $table->foreign('student_record_id')->references('id')->on('student_records');

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
