<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('us_identification', 10)->nullable();
            $table->string('us_firstname')->nullable();
            $table->string('us_secondname')->nullable();
            $table->string('us_first_lastname')->nullable();
            $table->string('us_second_lastname')->nullable();
            $table->date('us_date_birth')->nullable();
            $table->string('us_gender')->nullable();
            $table->string('us_username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->integer('type_identification_id')->unsigned();
            $table->foreign('type_identification_id')->references('id')->on('type_identifications');

            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
