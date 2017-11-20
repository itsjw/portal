<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('confirmed_at')->nullable();
            $table->string('confirmation_token')->nullable();

            $table->string('username')->unique();
            $table->string('avatar_path')->nullable();
            $table->string('profile_cover')->default('https://phpmap.co/images/profile_cover.jpg');

            $table->boolean('is_admin')->default('0');
            $table->boolean('is_verified')->default('0');
            $table->boolean('is_sponsor')->default('0');

            $table->string('github_id')->unique()->nullable();

            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();

            $table->string('referred_by')->nullable();
            $table->string('affiliate_id')->unique();

            $table->string('company')->nullable();
            $table->string('website')->nullable();
            $table->string('github_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->longText('intro')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
