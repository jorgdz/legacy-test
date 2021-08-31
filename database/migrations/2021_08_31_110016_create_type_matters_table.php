<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeMattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_matters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tm_name', 255)->nullable();
            $table->string('tm_description', 255)->nullable();
            $table->string('tm_order', 255)->nullable();

            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');

            $table->boolean('tm_order');
            $table->boolean('mt_matter_count');

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
        Schema::dropIfExists('type_matters');
    }
}
