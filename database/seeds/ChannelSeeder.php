<?php

use App\Models\Channel;
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
        Channel::create([
            'name' => 'Lounge',
            'slug' => 'talk-lounge',
        ]);

        Channel::create([
            'name' => 'Off Topic',
            'slug' => 'talk-off-topic',
        ]);

        Channel::create([
            'name' => 'Laravel',
            'slug' => 'framework-laravel',
        ]);

        Channel::create([
            'name' => 'Symfony',
            'slug' => 'framework-symfony',
        ]);

        Channel::create([
            'name' => 'Phalcon',
            'slug' => 'framework-phalcon',
        ]);

        Channel::create([
            'name' => 'Yii',
            'slug' => 'framework-yii',
        ]);

        Channel::create([
            'name' => 'Slim',
            'slug' => 'framework-slim',
        ]);

        Channel::create([
            'name' => 'CakePHP',
            'slug' => 'framework-cakephp',
        ]);

        Channel::create([
            'name' => 'FuelPHP',
            'slug' => 'framework-fuelphp',
        ]);

        Channel::create([
            'name' => 'Aura',
            'slug' => 'framework-aura',
        ]);

        Channel::create([
            'name' => 'Codeigniter',
            'slug' => 'framework-codeigniter',
        ]);

        Channel::create([
            'name' => 'Zend',
            'slug' => 'framework-zend',
        ]);
    }
}
