<?php

use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channels')->insert([
            'name' => 'Laravel',
            'slug' => 'framework-laravel'
        ]);

        DB::table('channels')->insert([
            'name' => 'Symfony',
            'slug' => 'framework-symfony'
        ]);

        DB::table('channels')->insert([
            'name' => 'Phalcon',
            'slug' => 'framework-phalcon'
        ]);

        DB::table('channels')->insert([
            'name' => 'Yii',
            'slug' => 'framework-yii'
        ]);

        DB::table('channels')->insert([
            'name' => 'Slim',
            'slug' => 'framework-slim'
        ]);

        DB::table('channels')->insert([
            'name' => 'CakePHP',
            'slug' => 'framework-cakephp'
        ]);

        DB::table('channels')->insert([
            'name' => 'FuelPHP',
            'slug' => 'framework-fuelphp'
        ]);

        DB::table('channels')->insert([
            'name' => 'Aura',
            'slug' => 'framework-aura'
        ]);

        DB::table('channels')->insert([
            'name' => 'Codeigniter',
            'slug' => 'framework-codeigniter'
        ]);

        DB::table('channels')->insert([
            'name' => 'Zend',
            'slug' => 'framework-zend'
        ]);
    }
}
