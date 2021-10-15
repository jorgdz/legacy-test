<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferPeriodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_period', function (Blueprint $table) {
            /* $table->bigIncrements('id'); */

            $table->bigInteger('period_id')->unsigned();
            $table->foreign('period_id')->references('id')->on('periods');

            $table->bigInteger('offer_id')->unsigned();
            $table->foreign('offer_id')->references('id')->on('offers');

            /* $table->bigInteger('status_id')->unsigned();
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
        Schema::dropIfExists('offer_period');
    }
}
