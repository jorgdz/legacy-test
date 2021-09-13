<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHourhandPeriodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hourhand_period', function (Blueprint $table) {
            /* $table->increments('id'); */

            $table->integer('period_id')->unsigned();
            $table->foreign('period_id')->references('id')->on('periods');

            $table->integer('hourhand_id')->unsigned();
            $table->foreign('hourhand_id')->references('id')->on('hourhands');

            /* $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('id')->on('status'); */

            /* $table->timestamps();
            $table->softDeletes(); */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hourhand_period');
    }
}
