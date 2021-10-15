<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('inst_name')->nullable();
            $table->integer('province_id')->unsigned();
            $table->foreign('province_id')->references('id')->on('catalogs');
            $table->integer('economic_group_id')->unsigned();
            $table->foreign('economic_group_id')->references('id')->on('economic_groups');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');
            $table->integer('type_institute_id')->unsigned();
            $table->foreign('type_institute_id')->references('id')->on('type_institutes');
            $table->boolean('has_agreement');
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
        Schema::dropIfExists('institutes');
    }
}
