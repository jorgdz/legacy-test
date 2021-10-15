<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value')->nullable();
            
            $table->integer('application_id')->unsigned();
            $table->foreign('application_id')->references('id')->on('applications');
            $table->integer('config_type_application_id')->unsigned();
            $table->foreign('config_type_application_id')->references('id')->on('config_type_applications');

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
        Schema::dropIfExists('application_details');
    }
}
