<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigTypeApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_type_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('conf_typ_description')->nullable();
            $table->string('conf_typ_data_type')->nullable();
            $table->string('conf_typ_object_name')->nullable();
            $table->string('conf_typ_object_id')->nullable();
            $table->string('conf_typ_file_path')->nullable();
 
            $table->integer('type_application_id')->unsigned();
            $table->foreign('type_application_id')->references('id')->on('type_applications');
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
        Schema::dropIfExists('config_type_applications');
    }
}
