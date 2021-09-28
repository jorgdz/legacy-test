<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailMatterMeshesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_matter_meshes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('matter_mesh_id')->unsigned();
            $table->foreign('matter_mesh_id')->references('id')->on('matter_mesh');

             $table->integer('components_id')->unsigned();
             $table->foreign('components_id')->references('id')->on('components');

            $table->integer('dem_workload')->nullable();

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
        Schema::dropIfExists('detail_matter_meshes');
    }
}
