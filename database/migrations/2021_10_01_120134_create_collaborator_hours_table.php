<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

class CreateCollaboratorHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    //    ELIMNAR TABLA
        // Schema::create('collaborator_hours', function (Blueprint $table) {
        //     $table->bigIncrements('id');


        //     $table->bigInteger('period_id')->unsigned();
        //     $table->foreign('period_id')->references('id')->on('periods');

        //     $table->bigInteger('education_level_id')->unsigned();
        //     $table->foreign('education_level_id')->references('id')->on('education_levels');

        //     $table->string('ch_working_time')->nullable();///tiempo de dedicacion TC/MT/TH

        //     $table->bigInteger('status_id')->unsigned();
        //     $table->foreign('status_id')->references('id')->on('status');

        //     $table->timestamps();
        //     $table->softDeletes();

        // });

      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collaborator_hours');
    }
}
