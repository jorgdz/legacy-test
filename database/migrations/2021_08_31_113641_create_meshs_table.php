<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeshsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meshs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pensum_id')->unsigned();//FK
            $table->integer('level_edu_id')->unsigned();//FK
            $table->integer('status_id')->unsigned();
            
            // $table->foreign('pensum_id')->references('id')->on('pensums');// EC
            // $table->foreign('level_edu_id')->references('id')->on('pensums');//education_levels  EC
            // $table->foreign('status_id')->references('id')->on('status');

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
        Schema::dropIfExists('meshs');
    }
}
