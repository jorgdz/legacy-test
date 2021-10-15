<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransacTypeApplicationStatusRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transac_type_application_status_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transac_secuencial');
            // $table->integer('transac_status_reg');
            $table->dateTime('transac_register_date');
            $table->string('transac_comments')->nullable();
            $table->string('user');

            $table->integer('type_application_status_roles_id')->unsigned();
            $table->foreign('type_application_status_roles_id')->references('id')->on('type_application_status_roles');
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
        Schema::dropIfExists('transac_type_application_status_roles');
    }
}
