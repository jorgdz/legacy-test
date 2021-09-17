<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatterMeshTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matter_mesh', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('matter_id')->unsigned();
            $table->integer('mesh_id')->unsigned();
            $table->string('calification_type', 255)->nullable();
            $table->float('min_calification', 8, 4);
            $table->integer('num_fouls')->unsigned();
            $table->string('matter_rename', 255)->nullable();

            $table->string('clasification_matter', 255)->nullable();
            $table->integer('group')->nullable(); // grupo, sección o nivel o semestre al que pertenece
            $table->integer('order')->nullable(); // Por cada grupo tengo una numeración para ordernar los registros

            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');

            $table->foreign('matter_id')->references('id')->on('matters');
            $table->foreign('mesh_id')->references('id')->on('meshs');

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
        Schema::dropIfExists('matter_mesh');
    }
}
