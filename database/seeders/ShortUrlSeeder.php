<?php

namespace Database\Seeders;

use App\Models\ShortUrl;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ShortUrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url_test = ['https://www.nu.nl/', 'https://laravel.com/docs/8.x/controllers', 'https://getcomposer.org/download/'];

        $urls = ShortUrl::first();
        if (!$urls) {
            while (!empty($url_test))
                
            ShortUrl::factory()->create(['url' =>array_shift($url_test)]);
        }
    }
}
