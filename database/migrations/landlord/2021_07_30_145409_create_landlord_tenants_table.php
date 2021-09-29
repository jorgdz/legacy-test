<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandlordTenantsTable extends Migration
{
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo_name',255)->nullable();
            $table->string('logo_path',255)->nullable();
            $table->string('domain')->unique();
            $table->string('domain_client')->unique();
            $table->string('database');

            $table->string('description',255)->nullable();
            $table->string('website',255)->nullable();
            $table->string('assigned_site',255)->nullable();
            $table->string('facebook',255)->nullable();
            $table->string('instagram',255)->nullable();
            $table->string('linkedin',255)->nullable();
            $table->string('youtube',255)->nullable();
            $table->string('info_mail',255)->nullable();
            $table->string('matrix',255)->nullable();
            $table->string('color',255)->nullable();

            $table->string('students_number')->nullable();
          
            $table->timestamps();
            $table->softDeletes();


        });
    }
}
