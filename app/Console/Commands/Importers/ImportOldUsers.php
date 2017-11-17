<?php

namespace App\Console\Commands\Importers;

use App\Models\User;
use Illuminate\Console\Command;

class ImportOldUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:old-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = 'https://phpmap.co/api_public/users';

        $users = json_decode(file_get_contents($url));

        $newUser = new User();
        foreach ($users as $user) {
            $newUser->create([
                'name' => $user->username,
                'email' => $user->email,
                'username' => $user->username,
                'password' => bcrypt(str_random(13)),
                'avatar_path' => null,
                'profile_cover' => $user->profile_cover,
                'github_id' => $user->github_id,
                'is_admin' => $user->is_admin,
                'lat' => $user->lat,
                'lng' => $user->lng,
                'address' => $user->address,
                'city' => $user->city,
                'country' => $user->country,
                'company' => $user->company,
                'intro' => $user->intro,
                'website' => $user->website,
                'github_url' => $user->github_url,
                'twitter_url' => $user->twitter_url,
                'facebook_url' => $user->facebook_url,
                'linkedin_url' => $user->linkedin_url,
                'is_verified' => $user->is_verified,
                'is_sponsor' => $user->is_sponsor,
                'affiliate_id' => $user->affiliate_id,
                'referred_by' => null,
            ]);
        }
    }
}
