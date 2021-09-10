<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        
        Schema::create('student_documents', function (Blueprint $table) {

            $table->increments('id');
            $table->string('stu_doc_url')->nullable();
            $table->string('stu_doc_name_file')->nullable();
        
            $table->integer('type_document_id')->unsigned();
            $table->foreign('type_document_id')->references('id')->on('type_document');

            $table->integer('students_id')->unsigned();
            $table->foreign('students_id')->references('id')->on('students');

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
        Schema::dropIfExists('student_documents');
    }
}
