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
            $table->bigIncrements('id');

            $table->bigInteger('mesh_id')->unsigned();
            $table->foreign('mesh_id')->references('id')->on('curriculums');

             $table->bigInteger('component_id')->unsigned();
             $table->foreign('component_id')->references('id')->on('components');

            $table->bigInteger('lea_workload')->default(0);

            $table->bigInteger('status_id')->default(1);
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
