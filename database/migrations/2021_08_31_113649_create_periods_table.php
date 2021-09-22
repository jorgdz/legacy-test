<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->increments('id');

            $table->string('per_name', 255)->nullable();
            $table->string('per_reference', 100)->nullable();
            $table->integer('per_current_year')->nullable();
            $table->string('per_due_year')->nullable();
            $table->integer('per_min_matter_enrollment')->nullable();
            $table->integer('per_max_matter_enrollment')->nullable();
            $table->integer('per_num_fees')->nullable();
            $table->float('per_fees', 8, 3)->nullable();
            $table->boolean('per_pay_enrollment');

            $table->integer('campus_id')->unsigned();
            $table->foreign('campus_id')->references('id')->on('campus');

            $table->integer('type_period_id')->unsigned();
            $table->foreign('type_period_id')->references('id')->on('type_periods');

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
        Schema::dropIfExists('periods');
    }
}
