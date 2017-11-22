<?php

use App\Models\LinkCategory;
use Illuminate\Database\Seeder;

class LinkCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LinkCategory::create([
            'title' => 'Packages',
            'slug' => 'packages',
        ]);

        LinkCategory::create([
            'title' => 'Tutorials',
            'slug' => 'tutorials',
        ]);

        LinkCategory::create([
            'title' => 'Projects',
            'slug' => 'projects',
        ]);

        LinkCategory::create([
            'title' => 'Meetups',
            'slug' => 'meetups',
        ]);

        LinkCategory::create([
            'title' => 'News',
            'slug' => 'news',
        ]);

        LinkCategory::create([
            'title' => 'Social',
            'slug' => 'social',
        ]);
    }
}
