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

            $table->string('mat_name', 255)->nullable();
            $table->string('mat_description', 255)->nullable();
            $table->string('mat_acronym', 3)->nullable();
            $table->string('cod_matter_migration', 255)->nullable();
            $table->string('cod_old_migration', 255)->nullable();
            $table->integer('type_matter_id')->unsigned();
            $table->integer('type_calification_id')->unsigned();
            $table->float('min_note', 8, 4)->unsigned();
            $table->integer('status_id')->unsigned();

            $table->foreign('status_id')->references('id')->on('status');
            $table->foreign('type_matter_id')->references('id')->on('type_matters');
            $table->foreign('type_calification_id')->references('id')->on('type_califications');

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
