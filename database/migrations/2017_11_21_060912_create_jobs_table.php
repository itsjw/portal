<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedInteger('job_company_id');

            $table->string('title');

            $table->longText('description')->nullable();
            $table->longText('perks')->nullable();
            $table->longText('expectation')->nullable();

            $table->foreign('job_category_id')
                ->references('id')
                ->on('job_categories')
                ->onDelete('cascade');

            $table->foreign('job_company_id')
                ->references('id')
                ->on('job_companies')
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
