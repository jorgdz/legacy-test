<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherSignaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_signatures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sign_position');
            $table->string('sign_person');
            $table->string('sign_reference');

            $table->integer('type_report_id')->unsigned();
            $table->foreign('type_report_id')->references('id')->on('type_reports');

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
        Schema::dropIfExists('other_signatures');
    }
}
