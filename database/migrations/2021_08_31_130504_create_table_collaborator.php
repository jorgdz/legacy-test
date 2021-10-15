<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCollaborator extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborators', function (Blueprint $table) {
            // Add the Auto-Increment column
            //$table->bigIncrements("coll_contract_num");

            // Remove the primary key
            //$table->dropPrimary("collaborators_coll_contract_num_primary");

            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('coll_email')->unique();
            $table->string('coll_type',1)->nullable();
            $table->string('coll_activity')->nullable();
            $table->bigInteger('coll_journey_hours')->nullable();
            $table->string('coll_journey_description')->nullable();

            $table->boolean('coll_dependency')->nullable();
            $table->boolean('coll_advice')->nullable(); //campo booleano para saber si es consejero

            $table->bigInteger('position_company_id')->unsigned();
            $table->foreign('position_company_id')->references('id')->on('positions');

            $table->bigInteger('education_level_principal_id')->unsigned();
            $table->foreign('education_level_principal_id')->references('id')->on('education_levels');

            $table->timestamp('coll_entering_date')->nullable();
            $table->timestamp('coll_leaving_date')->nullable();
            $table->string('coll_membership_num')->nullable();
            $table->string('coll_contract_num')->nullable();
            $table->boolean('coll_has_nomination')->nullable();
            $table->timestamp('coll_nomination_entering_date')->nullable();
            $table->timestamp('coll_nomination_leaving_date')->nullable();
            $table->timestamp('coll_disabled_reason')->nullable();

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
        Schema::dropIfExists('collaborators');
    }
}
