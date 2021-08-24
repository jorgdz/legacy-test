<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableActionDirectoryModuleRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_directory_module_role', function (Blueprint $table) {
            $table->integer('directory_module_role_id')->unsigned();
            $table->integer('action_id')->unsigned();

            $table->foreign('directory_module_role_id')->references('id')->on('directory_module_roles');
            $table->foreign('action_id')->references('id')->on('action_directories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('action_directory_module_role');
    }
}
