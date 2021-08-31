<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_levels', function (Blueprint $table) {
            $table->increments('id');

            $table->string('edu_name', 255);
            $table->string('edu_alias', 255);
            $table->integer('edu_order');

            $table->integer('offer_id')->unsigned();
            $table->foreign('offer_id')->references('id')->on('offers');

            $table->integer('principal_id')->unsigned();
            //$table->foreign('principal_id')->references('id')->on('principal');

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
        Schema::dropIfExists('education_levels');
    }
}
