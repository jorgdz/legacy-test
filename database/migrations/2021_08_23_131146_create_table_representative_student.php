<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRepresentativeStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representative_student', function (Blueprint $table) {
            $table->integer('student_id')->unsigned();
            $table->integer('representative_id')->unsigned();

            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('representative_id')->references('id')->on('representatives');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('representative_student');
    }
}
