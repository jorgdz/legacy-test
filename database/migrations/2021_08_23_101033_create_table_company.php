<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('co_name', 255)->nullable();
            $table->string('co_description', 255)->nullable();
            $table->string('co_sitio', 255)->nullable();
            $table->string('co_facebook', 255)->nullable();
            $table->string('co_instagram', 255)->nullable();
            $table->string('co_linkedin', 255)->nullable();
            $table->string('co_youtube', 255)->nullable();
            $table->string('co_estado', 50)->nullable();
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
        Schema::dropIfExists('companies');
    }
}
