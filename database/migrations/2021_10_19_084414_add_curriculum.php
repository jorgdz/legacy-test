<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCurriculum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_student', function (Blueprint $table) {
            $table->bigInteger('curriculum_id')->nullable()->unsigned();
            $table->bigInteger('subject_curriculum_id')->nullable()->unsigned();

            $table->foreign('curriculum_id')->references('id')->on('curriculums');    
            $table->foreign('subject_curriculum_id')->references('id')->on('subject_curriculum');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_student', function (Blueprint $table) {
            $table->dropColumn('curriculum_id');
            $table->dropColumn('subject_curriculum_id');
        });
    }
}
