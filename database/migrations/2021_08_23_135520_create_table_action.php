<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_directories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('actd_name')->nullable();
            $table->string('actd_description')->nullable();
            $table->string('actd_route')->nullable();
            $table->string('actd_initial', 3)->unique();
            $table->integer('directory_id')->unsigned();
            $table->foreign('directory_id')->references('id')->on('directories');

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
        Schema::dropIfExists('action_directories');
    }
}
