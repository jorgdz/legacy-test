<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('period_stages', function (Blueprint $table) {
            $table->increments('id');

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();

            $table->integer('stage_id')->unsigned();
            $table->foreign('stage_id')->references('id')->on('stages');

            $table->integer('period_id')->unsigned();
            $table->foreign('period_id')->references('id')->on('periods');

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
        Schema::dropIfExists('period_stages');
    }
}
