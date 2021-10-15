<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeApplicationStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_application_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order')->unsigned();

            $table->bigInteger('type_application_id')->unsigned();
            $table->foreign('type_application_id')->references('id')->on('type_applications');
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
        Schema::dropIfExists('type_application_status');
    }
}
