<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatterStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::create('matter_status', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 255)->nullable();
            $table->string('description', 255)->nullable();
            //$table->string('type', 255)->nullable();

            $table->integer('type_matter_id')->unsigned();
            $table->foreign('type_matter_id')->references('id')->on('type_matters');
           
            
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
        Schema::dropIfExists('matter_status');
    }
}
