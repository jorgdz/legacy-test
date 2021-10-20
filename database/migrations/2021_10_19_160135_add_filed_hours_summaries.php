<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFiledHoursSummaries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hours_summaries', function (Blueprint $table) {

            $table->dropForeign('hours_summaries_collaborator_hour_id_foreign');
            $table->dropColumn('collaborator_hour_id');

       

           // $table->string('hs_working_time')->nullable(); ///tiempo de dedicacion TC/MT/TH

            $table->bigInteger('period_id')->unsigned();
            $table->foreign('period_id')->references('id')->on('periods');

            $table->bigInteger('education_level_id')->unsigned();
            $table->foreign('education_level_id')->references('id')->on('education_levels');

            $table->bigInteger('requisition_id')->nullable();
            // $table->foreign('education_level_id')->references('id')->on('education_levels');
            

            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hours_summaries', function (Blueprint $table) {
            //
        });
    }
}
