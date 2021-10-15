<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExternalHomologationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('external_homologations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('inst_subject_id')->unsigned();
            $table->foreign('inst_subject_id')->references('id')->on('institution_subjects');

            $table->bigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects');

            $table->bigInteger('relation_pct');
            $table->string('comments', 500)->nullable();

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
        Schema::dropIfExists('external_homologations');
    }
}
