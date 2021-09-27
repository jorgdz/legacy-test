<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRecodsPeriodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_recods_period', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('student_record_id')->unsigned();
            $table->foreign('student_record_id')->references('id')->on('student_records');

            $table->integer('periodo_id')->unsigned();
            $table->foreign('periodo_id')->references('id')->on('periods');

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
        Schema::dropIfExists('student_recods_period');
    }
}
