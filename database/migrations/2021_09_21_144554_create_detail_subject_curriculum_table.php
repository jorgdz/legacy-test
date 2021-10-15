<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSubjectCurriculumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_subject_curriculum', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('matter_mesh_id')->unsigned();
            $table->foreign('matter_mesh_id')->references('id')->on('subject_curriculum');

             $table->bigInteger('components_id')->unsigned();
             $table->foreign('components_id')->references('id')->on('components');

            $table->bigInteger('dem_workload')->nullable();

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
        Schema::dropIfExists('detail_subject_curriculum');
    }
}
