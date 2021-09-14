<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePersonJob extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('per_job_organization', 255)->nullable();
            $table->string('per_job_position', 255)->nullable();
            $table->string('per_job_direction', 255)->nullable();
            $table->string('per_job_phone', 20)->nullable();
            $table->date('per_job_start_date')->nullable();
            $table->date('per_job_end_date')->nullable();
            $table->boolean('per_job_current')->nullable();
            $table->boolean('per_job_iess_affiliated')->nullable();

            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');

            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons');

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
        Schema::dropIfExists('person_jobs');
    }
}
