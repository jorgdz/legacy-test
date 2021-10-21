<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('agr_name');
            $table->bigInteger('agr_num_matter_homologate')->nullable();

            $table->date('agr_start_date')->nullable();
            $table->date('agr_end_date')->nullable();
            
            $table->bigInteger('institute_id')->unsigned();

            $table->foreign('institute_id')->references('id')->on('institutes');

            $table->bigInteger('status_id')->unsigned();

            $table->foreign('status_id')->references('id')->on('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agreements');
    }
}
