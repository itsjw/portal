<?php

use App\Models\JobCategory;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobCategory::create([
            'title' => 'Full Time',
            'slug' => 'full-time',
        ]);

        JobCategory::create([
            'title' => 'Part Time',
            'slug' => 'part-time',
        ]);

        JobCategory::create([
            'title' => 'Freelance',
            'slug' => 'freelance',
        ]);

        JobCategory::create([
            'title' => 'Temporary',
            'slug' => 'temporary',
        ]);

        JobCategory::create([
            'title' => 'Internship',
            'slug' => 'internship',
        ]);

        JobCategory::create([
            'title' => 'Remote',
            'slug' => 'remote',
        ]);
    }
}
