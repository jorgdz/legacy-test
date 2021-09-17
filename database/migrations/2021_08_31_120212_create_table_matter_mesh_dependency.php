<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMatterMeshDependency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mat_mesh_dependencies', function (Blueprint $table) {
            $table->integer('parent_matter_mesh_id')->unsigned();
            $table->integer('child_matter_mesh_id')->unsigned();

            $table->foreign('parent_matter_mesh_id')
                ->references('id')
                ->on('matter_mesh');

            $table->foreign('child_matter_mesh_id')
                ->references('id')
                ->on('matter_mesh');

            $table->primary(['parent_matter_mesh_id', 'child_matter_mesh_id'], 'mat_mesh_dependencies_matter_mesh_id_matter_mesh_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mat_mesh_dependencies');
    }
}
