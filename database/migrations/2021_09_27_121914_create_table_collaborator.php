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
            //$table->increments("coll_contract_num");

            // Remove the primary key
            //$table->dropPrimary("collaborators_coll_contract_num_primary");

            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('coll_email')->unique();
            $table->string('coll_type',1)->nullable();
            $table->string('coll_activity')->nullable();    
            $table->integer('coll_journey_hours')->nullable();
            $table->string('coll_journey_description')->nullable();
            
            $table->boolean('coll_dependency')->nullable(); 

            $table->integer('position_company_id')->unsigned();
            $table->foreign('position_company_id')->references('id')->on('positions');
            
            $table->integer('education_level_principal_id')->unsigned();
            $table->foreign('education_level_principal_id')->references('id')->on('education_levels');

            $table->timestamp('coll_entering_date')->nullable();
            $table->timestamp('coll_leaving_date')->nullable();
            $table->integer('coll_membership_num')->nullable();
            $table->integer('coll_contract_num')->nullable();
            $table->boolean('coll_has_nomination')->nullable();
            $table->timestamp('coll_nomination_entering_date')->nullable();
            $table->timestamp('coll_nomination_leaving_date')->nullable();
            $table->timestamp('coll_disabled_reason')->nullable();

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
        Schema::dropIfExists('collaborators');
    }
}
