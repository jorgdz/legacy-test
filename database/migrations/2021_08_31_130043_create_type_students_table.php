<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_students', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('te_name', 255)->nullable();
            $table->string('te_description', 255)->nullable();

            // $table->bigInteger('offer_id')->unsigned();
            // $table->foreign('offer_id')->references('id')->on('offers');
           
            $table->bigInteger('status_id')->unsigned();
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
        Schema::dropIfExists('type_students');
    }
}
