<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_components', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('mesh_id')->unsigned();
            $table->foreign('mesh_id')->references('id')->on('meshs');

             $table->integer('component_id')->unsigned();
             $table->foreign('component_id')->references('id')->on('components');

            $table->integer('lea_workload')->nullable();

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
        Schema::dropIfExists('learning_components');
    }
}
