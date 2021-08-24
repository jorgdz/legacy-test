<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDirectoryModuleRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directory_module_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('directory_id')->unsigned();
            $table->foreign('directory_id')->references('id')->on('directories');

            $table->integer('module_role_id')->unsigned();
            $table->foreign('module_role_id')->references('id')->on('module_roles');
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
        Schema::dropIfExists('directory_module_roles');
    }
}
