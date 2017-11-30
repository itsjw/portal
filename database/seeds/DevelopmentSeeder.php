<?php

use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\User', 100)->create();

        factory('App\Models\Link', 100)->create();

        factory('App\Models\JobCompany', 10)->create();
        factory('App\Models\Job', 100)->create();

        factory('App\Models\Meetup', 100)->create();

        factory('App\Models\Thread', 100)->create();
    }
}
