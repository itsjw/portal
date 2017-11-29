<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_companies', function (Blueprint $table) {
            $table->increments('id');

            $table->string('logo_path')->nullable();

            $table->string('name');

            $table->longText('description')->nullable();

            $table->string('url')->nullable();
            $table->string('phone')->nullable();

            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('zip')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();

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
        Schema::dropIfExists('job_companies');
    }
}
