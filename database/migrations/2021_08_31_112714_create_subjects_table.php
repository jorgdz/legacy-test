<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('mat_name', 255)->nullable();
            $table->string('cod_matter_migration', 255)->nullable();
            $table->string('cod_old_migration', 255)->nullable();
            $table->string('mat_acronym', 3)->nullable();
            $table->string('mat_translate')->nullable();
            $table->string('mat_description', 255)->nullable();
            $table->enum('mat_payment_type', ['horas', 'creditos']);

            $table->integer('type_matter_id')->unsigned();
            $table->foreign('type_matter_id')->references('id')->on('type_subjects');

            $table->integer('education_level_id')->unsigned();
            $table->foreign('education_level_id')->references('id')->on('education_levels');

            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas');

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
        Schema::dropIfExists('subjects');
    }
}
