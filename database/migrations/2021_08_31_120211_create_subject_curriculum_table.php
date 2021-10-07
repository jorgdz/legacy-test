<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectCurriculumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_curriculum', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('matter_id')->unsigned();
            $table->foreign('matter_id')->references('id')->on('subjects');

            $table->integer('mesh_id')->unsigned();
            $table->foreign('mesh_id')->references('id')->on('curriculums');

            $table->integer('simbology_id')->unsigned();
            $table->foreign('simbology_id')->references('id')->on('simbologies');

            $table->boolean('can_homologate')->nullable();
            $table->boolean('is_prerequisite')->nullable();
            $table->float('min_note', 8, 4)->nullable()->unsigned();
            $table->float('min_calification', 8, 4)->nullable();
            $table->float('max_calification', 8, 4)->nullable();
            $table->integer('num_fouls')->nullable();
            $table->string('matter_rename', 255)->nullable();
            $table->integer('group')->nullable(); /* grupo, sección o nivel o semestre al que pertenece */
            $table->integer('order')->nullable(); /* Por cada grupo tengo una numeración para ordernar los registros */

            $table->integer('calification_models_id')->nullable();
            $table->foreign('calification_models_id')->references('id')->on('calification_models');

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
        Schema::dropIfExists('subject_curriculum');
    }
}
