<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationLevelSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_level_subject', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('group_nivelation_id')->unsigned();
            $table->foreign('group_nivelation_id')->on('catalogs')->references('id');

            $table->integer('education_level_id')->unsigned();
            $table->foreign('education_level_id')->on('education_levels')->references('id');

            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->on('subjects')->references('id');

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
        Schema::dropIfExists('education_level_subject');
    }
}
