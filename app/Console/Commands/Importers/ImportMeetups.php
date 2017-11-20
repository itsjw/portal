<?php

namespace App\Console\Commands\Importers;

use App\Models\Meetup;
use Illuminate\Console\Command;

class ImportMeetups extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:meetups';

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
        $key = env('MEETUP_KEY');
        $url = "https://api.meetup.com/find/groups?key=$key&radius=global&filter=all&sign=true&text=php&is_simplehtml=true";
        $meetups = json_decode(file_get_contents($url));

        $newMeetup = new Meetup();
        foreach ($meetups as $meetup) {
            $newMeetup->create([
                'name'                   => $meetup->name,
                'link'                   => $meetup->link,
                'url_name'               => $meetup->urlname,
                'description'            => $meetup->description,
                'city'                   => $meetup->city,
                'country'                => $meetup->country,
                'localized_country_name' => $meetup->localized_country_name,
                'state'                  => $meetup->state,
                'lat'                    => $meetup->lat,
                'lon'                    => $meetup->lon,
                'member_count'           => $meetup->members,
                'who'                    => $meetup->who,
                'timezone'               => $meetup->timezone,
            ]);
        }
    }
}
