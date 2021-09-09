<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_criterias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('crit_name')->nullable();
            $table->string('crit_description')->nullable();
            $table->string('crit_acronym', 10)->nullable();
            $table->boolean('crit_qualifity')->nullable();
            $table->integer('crit_parent_id')->nullable();

            $table->integer('offer_id')->unsigned();
            $table->foreign('offer_id')->references('id')->on('offers');

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
        Schema::dropIfExists('criterias');
    }
}
