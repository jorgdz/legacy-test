<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHourhandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hourhands', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('hour_monday')->nullable();
            $table->boolean('hour_tuesday')->nullable();
            $table->boolean('hour_wednesday')->nullable();
            $table->boolean('hour_thursday')->nullable();
            $table->boolean('hour_friday')->nullable();
            $table->boolean('hour_saturday')->nullable();
            $table->boolean('hour_sunday')->nullable();
            $table->string('hour_start_time_monday')->nullable();
            $table->string('hour_end_time_monday')->nullable();
            $table->string('hour_start_time_tuesday')->nullable();
            $table->string('hour_end_time_tuesday')->nullable();
            $table->string('hour_start_time_wednesday')->nullable();
            $table->string('hour_end_time_wednesday')->nullable();
            $table->string('hour_start_time_thursday')->nullable();
            $table->string('hour_end_time_thursday')->nullable();
            $table->string('hour_start_time_friday')->nullable();
            $table->string('hour_end_time_friday')->nullable();
            $table->string('hour_start_time_saturday')->nullable();
            $table->string('hour_end_time_saturday')->nullable();
            $table->string('hour_start_time_sunday')->nullable();
            $table->string('hour_end_time_sunday')->nullable();
            $table->string('hour_description')->nullable();

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
        Schema::dropIfExists('hourhands');
    }
}
