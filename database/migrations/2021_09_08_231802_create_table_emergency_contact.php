<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEmergencyContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('em_ct_name', 500)->nullable();
            $table->string('em_ct_first_phone', 50)->nullable();
            $table->string('em_ct_second_phone', 50)->nullable();

            $table->integer('type_kinship_id')->unsigned();
            $table->foreign('type_kinship_id')->references('id')->on('catalogs');

            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');

            $table->integer('person_id')->unsigned();
            $table->foreign('person_id')->references('id')->on('persons');

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
        Schema::dropIfExists('emergency_contacts');
    }
}
