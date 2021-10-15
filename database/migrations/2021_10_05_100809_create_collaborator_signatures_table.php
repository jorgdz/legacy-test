<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaboratorSignaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborator_signatures', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('collaborator_id')->unsigned();
            $table->foreign('collaborator_id')->references('id')->on('collaborators');

            $table->bigInteger('position_id')->unsigned();
            $table->foreign('position_id')->references('id')->on('positions');

            $table->string('sign_reference');

            $table->bigInteger('type_report_id')->unsigned();
            $table->foreign('type_report_id')->references('id')->on('type_reports');

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
        Schema::dropIfExists('collaborator_signatures');
    }
}
