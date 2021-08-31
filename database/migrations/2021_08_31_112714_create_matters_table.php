<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMattersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod_mate_migration', 255)->nullable();
            $table->string('cod_old_migration', 255)->nullable();
            $table->string('des_matter', 255)->nullable();
            $table->integer('type_matter_id')->unsigned(); //FK
            $table->integer('type_calification_id')->unsigned(); //FK
            $table->integer('min_note')->unsigned();
            $table->integer('status_id')->unsigned();
            // $table->foreign('status_id')->references('id')->on('status');
            // $table->foreign('type_matter_id')->references('id')->on('type_matters');//JS
            // $table->foreign('type_calification_id')->references('id')->on('type_califications');//JS


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
        Schema::dropIfExists('matters');
    }
}
