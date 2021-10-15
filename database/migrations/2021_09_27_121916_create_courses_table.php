<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('max_capacity');

            $table->bigInteger('matter_id')->unsigned();
            $table->foreign('matter_id')->references('id')->on('subjects');

            $table->bigInteger('parallel_id')->unsigned();
            $table->foreign('parallel_id')->references('id')->on('parallels');

            $table->bigInteger('classroom_id')->unsigned();
            $table->foreign('classroom_id')->references('id')->on('classrooms');

            $table->bigInteger('modality_id')->unsigned();
            $table->foreign('modality_id')->references('id')->on('catalogs');

            $table->bigInteger('hourhand_id')->unsigned();
            $table->foreign('hourhand_id')->references('id')->on('hourhands');
            
            $table->bigInteger('collaborator_id')->nullable()->unsigned();
            $table->foreign('collaborator_id')->references('id')->on('collaborators');

            $table->bigInteger('curriculum_id')->unsigned();
            $table->foreign('curriculum_id')->references('id')->on('curriculums');

            $table->bigInteger('period_id')->unsigned();
            $table->foreign('period_id')->references('id')->on('periods');

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
        Schema::dropIfExists('courses');
    }
}
