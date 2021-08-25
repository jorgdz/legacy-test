<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableModuleRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles');

            $table->integer('module_id')->unsigned();
            $table->foreign('module_id')->references('id')->on('modules');

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
        Schema::dropIfExists('module_roles');
    }
}
