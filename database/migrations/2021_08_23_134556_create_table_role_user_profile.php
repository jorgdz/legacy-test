<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRoleUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user_profile', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('user_profile_id')->unsigned();

            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('user_profile_id')->references('id')->on('user_profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user_profile');
    }
}
