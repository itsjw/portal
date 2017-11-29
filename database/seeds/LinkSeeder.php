<?php

use App\Models\Link;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Link::create([
            'title'            => 'PHPMap Source',
            'user_id'          => '1',
            'link_category_id' => '3',
            'url'              => 'https://github.com/PHPMap/portal',
        ]);

        Link::create([
            'title'            => 'PHPMap on Twitter',
            'user_id'          => '1',
            'link_category_id' => '6',
            'url'              => 'https://twitter.com/PHPMap',
        ]);

        Link::create([
            'title'            => 'PHPMap on Facebook',
            'user_id'          => '1',
            'link_category_id' => '6',
            'url'              => 'https://facebook.com/phpmapco',
        ]);

        Link::create([
            'title'            => '@fwartner on Twitter',
            'user_id'          => '1',
            'link_category_id' => '6',
            'url'              => 'https://twitter.com/PHPMap',
        ]);
    }
}
