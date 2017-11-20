<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->string('url_name')->nullable();
            $table->longText('description')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('localized_country_name')->nullable();
            $table->string('state')->nullable();
            $table->string('lat')->nullable();
            $table->string('lon')->nullable();
            $table->string('member_count')->nullable();
            $table->string('who')->nullable();
            $table->string('timezone')->nullable();
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
        Schema::dropIfExists('meetups');
    }
}
