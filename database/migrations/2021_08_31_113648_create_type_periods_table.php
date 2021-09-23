<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_periods', function (Blueprint $table) {
            $table->increments('id');

            $table->string('tp_name', 255)->nullable();
            $table->string('tp_description', 255)->nullable();

            $table->integer('tp_min_matter_enrollment')->nullable();
            $table->integer('tp_max_matter_enrollment')->nullable();
            $table->integer('tp_num_fees')->nullable();
            $table->integer('tp_fees_enrollment')->nullable();
            $table->boolean('tp_pay_enrollment');

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
        Schema::dropIfExists('type_periods');
    }
}
