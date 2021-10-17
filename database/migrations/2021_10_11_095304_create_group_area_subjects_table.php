<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupAreaSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_area_subjects', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('group_nivelation_id')->unsigned();
            $table->foreign('group_nivelation_id')->on('group_areas')->references('id');

            $table->bigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')->on('subjects')->references('id');

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
        Schema::dropIfExists('group_area_subjects');
    }
}
