<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('typ_app_front_url')->nullable();
            $table->string('typ_app_name')->nullable();
            $table->string('typ_app_description')->nullable();
            $table->string('typ_app_acronym', 4)->nullable();
            $table->integer('parent_id')->nullable();

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
        Schema::dropIfExists('type_applications');
    }
}
