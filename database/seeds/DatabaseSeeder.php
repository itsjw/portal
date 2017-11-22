<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUserSeeder::class);
        $this->call(ChannelSeeder::class);
        $this->call(LinkCategorySeeder::class);
        $this->call(LinkSeeder::class);
    }
}
