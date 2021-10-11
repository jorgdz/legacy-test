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
            $table->string('co_website', 255)->nullable();
            $table->string('co_assigned_site', 255)->nullable();
            $table->string('co_facebook', 255)->nullable();
            $table->string('co_instagram', 255)->nullable();
            $table->string('co_linkedin', 255)->nullable();
            $table->string('co_youtube', 255)->nullable();
            $table->string('co_info_mail', 255)->nullable();
            $table->string('co_matrix', 255)->nullable();
            $table->string('co_color', 255)->nullable();
            $table->string('co_pay_notification', 255)->nullable();
            $table->string('co_ruc', 20)->nullable();
            $table->string('co_business_name', 255)->nullable();
            $table->string('co_comercial_name', 255)->nullable();
            $table->string('co_legal_identification', 255)->nullable();
            $table->string('co_agent_legal', 255)->nullable();
            $table->string('co_person_type', 255)->nullable();
            $table->string('co_direction', 255)->nullable();
            $table->string('co_phone', 255)->nullable();
            $table->string('co_email', 255)->nullable();

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
        Schema::dropIfExists('companies');
    }
}
