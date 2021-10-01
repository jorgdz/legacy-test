<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaboratorEducationLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborator_education_levels', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('collaborator_id')->unsigned();
            $table->foreign('collaborator_id')->references('id')->on('collaborators');

            $table->integer('education_level_id')->unsigned();
            $table->foreign('education_level_id')->references('id')->on('education_levels');
            
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
        Schema::dropIfExists('collaborator_offers_levels');
    }
}
