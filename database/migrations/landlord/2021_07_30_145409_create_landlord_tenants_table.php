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
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
