<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('job_category_id');

            $table->string('title');

            $table->string('company_name');
            $table->string('company_url')->nullable();
            $table->string('company_phone')->nullable();

            $table->string('company_address')->nullable();
            $table->string('company_country')->nullable();
            $table->string('company_city')->nullable();
            $table->string('company_zip')->nullable();
            $table->string('company_lat')->nullable();
            $table->string('company_lng')->nullable();

            $table->longText('description')->nullable();
            $table->longText('perks')->nullable();
            $table->longText('expectation')->nullable();

            $table->foreign('job_category_id')
                ->references('id')
                ->on('job_categories')
                ->onDelete('cascade');

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
        Schema::dropIfExists('jobs');
    }
}
