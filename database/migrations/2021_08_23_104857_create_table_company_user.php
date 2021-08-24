<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCompanyUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_user', function (Blueprint $table) {
            $table->integer('company_id')->unsigned();
            $table->integer('user_profile_id')->unsigned();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('user_profile_id')->references('id')->on('user_profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_user');
    }
}
