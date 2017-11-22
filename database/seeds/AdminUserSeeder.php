<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Florian Wartner',
            'username' => 'fwartner',
            'email' => 'f.wartner@phpmap.co',
            'password' => bcrypt('Hinterlader88!'),
            'is_admin' => true,
            'is_verified' => true,
            'company' => 'ABOUT YOU GmbH',
            'website' => 'https://phpmap.co',
            'github_url' => 'https://github.com/fwartner',
            'twitter_url' => 'https://twitter.com/fwartner',
            'intro' => 'Creator of PHPMap, Fullstack-Developer @ ABOUT YOU & Commandline-Ninja ',
            'affiliate_id' => str_random(10),
        ]);
    }
}
