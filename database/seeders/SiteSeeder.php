<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sites')->insert([
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'laravel.com',
                'url' => "https://laravel.com/",
                'created_at' => Carbon::create('2025', '10', '30'),
                'updated_at' => Carbon::create('2025', '10', '30')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'blognone.com',
                'url' => "https://www.blognone.com/",
                'created_at' => Carbon::create('2025', '10', '15'),
                'updated_at' => Carbon::create('2025', '10', '15')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'jediyuth.com',
                'url' => "https://jediyuth.com/",
                'created_at' => Carbon::create('2025', '10', '1'),
                'updated_at' => Carbon::create('2025', '10', '1')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'brandinside.asia',
                'url' => "https://brandinside.asia/",
                'created_at' => Carbon::create('2025', '09', '30'),
                'updated_at' => Carbon::create('2025', '09', '30')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'raspberrypi.com',
                'url' => "https://www.raspberrypi.com/",
                'created_at' => Carbon::create('2025', '09', '15'),
                'updated_at' => Carbon::create('2025', '09', '15')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'stackoverflow.com',
                'url' => "https://stackoverflow.com/",
                'created_at' => Carbon::create('2025', '09', '1'),
                'updated_at' => Carbon::create('2025', '09', '1')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'github.com',
                'url' => "https://github.com/",
                'created_at' => Carbon::create('2025', '08', '30'),
                'updated_at' => Carbon::create('2025', '08', '30')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'wikipedia.org',
                'url' => "https://en.wikipedia.org/wiki/Main_Page",
                'created_at' => Carbon::create('2025', '08', '15'),
                'updated_at' => Carbon::create('2025', '08', '15')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'set.or.th',
                'url' => "https://www.set.or.th/th/home",
                'created_at' => Carbon::create('2025', '08', '1'),
                'updated_at' => Carbon::create('2025', '08', '1')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'quora.com',
                'url' => "https://www.quora.com/",
                'created_at' => Carbon::create('2025', '07', '30'),
                'updated_at' => Carbon::create('2025', '07', '30')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'typeracer.com',
                'url' => "https://play.typeracer.com/",
                'created_at' => Carbon::create('2025', '07', '15'),
                'updated_at' => Carbon::create('2025', '07', '15')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'udacity.com',
                'url' => "https://www.udacity.com/",
                'created_at' => Carbon::create('2025', '07', '1'),
                'updated_at' => Carbon::create('2025', '07', '1')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'visualgo.net',
                'url' => "https://visualgo.net/en",
                'created_at' => Carbon::create('2025', '06', '30'),
                'updated_at' => Carbon::create('2025', '06', '30')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'scratch.mit.edu',
                'url' => "https://scratch.mit.edu/",
                'created_at' => Carbon::create('2025', '06', '15'),
                'updated_at' => Carbon::create('2025', '06', '15')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'longman',
                'url' => "https://www.ldoceonline.com/",
                'created_at' => Carbon::create('2025', '06', '1'),
                'updated_at' => Carbon::create('2025', '06', '1')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'Data Structure Visualizations',
                'url' => "https://www.cs.usfca.edu/~galles/visualization/Algorithms.html",
                'created_at' => Carbon::create('2025', '05', '30'),
                'updated_at' => Carbon::create('2025', '05', '30')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'monkeytype.com',
                'url' => "https://monkeytype.com/",
                'created_at' => Carbon::create('2025', '05', '15'),
                'updated_at' => Carbon::create('2025', '05', '15')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'pexels.com',
                'url' => "https://www.pexels.com/",
                'created_at' => Carbon::create('2025', '05', '1'),
                'updated_at' => Carbon::create('2025', '05', '1')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'typingtest.com',
                'url' => "https://www.typingtest.com/",
                'created_at' => Carbon::create('2025', '04', '30'),
                'updated_at' => Carbon::create('2025', '04', '30')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'microsoft.com',
                'url' => "https://www.microsoft.com/th-th/",
                'created_at' => Carbon::create('2025', '04', '15'),
                'updated_at' => Carbon::create('2025', '04', '15')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'gw2efficiency.com',
                'url' => "https://gw2efficiency.com/",
                'created_at' => Carbon::create('2025', '04', '1'),
                'updated_at' => Carbon::create('2025', '04', '1')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 1,
                'name' => 'dek-d.com',
                'url' => "https://www.dek-d.com/",
                'created_at' => Carbon::create('2025', '03', '30'),
                'updated_at' => Carbon::create('2025', '03', '30')
            ],
        ]);

        DB::table('sites')->insert([
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'stackoverflow.com',
                'url' => "https://stackoverflow.com/",
                'created_at' => Carbon::create('2025', '09', '1'),
                'updated_at' => Carbon::create('2025', '09', '1')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'github.com',
                'url' => "https://github.com/",
                'created_at' => Carbon::create('2025', '08', '30'),
                'updated_at' => Carbon::create('2025', '08', '30')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'wikipedia.org',
                'url' => "https://en.wikipedia.org/wiki/Main_Page",
                'created_at' => Carbon::create('2025', '08', '15'),
                'updated_at' => Carbon::create('2025', '08', '15')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'set.or.th',
                'url' => "https://www.set.or.th/th/home",
                'created_at' => Carbon::create('2025', '08', '1'),
                'updated_at' => Carbon::create('2025', '08', '1')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'quora.com',
                'url' => "https://www.quora.com/",
                'created_at' => Carbon::create('2025', '07', '30'),
                'updated_at' => Carbon::create('2025', '07', '30')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'typeracer.com',
                'url' => "https://play.typeracer.com/",
                'created_at' => Carbon::create('2025', '07', '15'),
                'updated_at' => Carbon::create('2025', '07', '15')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'udacity.com',
                'url' => "https://www.udacity.com/",
                'created_at' => Carbon::create('2025', '07', '1'),
                'updated_at' => Carbon::create('2025', '07', '1')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'visualgo.net',
                'url' => "https://visualgo.net/en",
                'created_at' => Carbon::create('2025', '06', '30'),
                'updated_at' => Carbon::create('2025', '06', '30')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'scratch.mit.edu',
                'url' => "https://scratch.mit.edu/",
                'created_at' => Carbon::create('2025', '06', '15'),
                'updated_at' => Carbon::create('2025', '06', '15')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'longman',
                'url' => "https://www.ldoceonline.com/",
                'created_at' => Carbon::create('2025', '06', '1'),
                'updated_at' => Carbon::create('2025', '06', '1')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'Data Structure Visualizations',
                'url' => "https://www.cs.usfca.edu/~galles/visualization/Algorithms.html",
                'created_at' => Carbon::create('2025', '05', '30'),
                'updated_at' => Carbon::create('2025', '05', '30')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'monkeytype.com',
                'url' => "https://monkeytype.com/",
                'created_at' => Carbon::create('2025', '05', '15'),
                'updated_at' => Carbon::create('2025', '05', '15')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'pexels.com',
                'url' => "https://www.pexels.com/",
                'created_at' => Carbon::create('2025', '05', '1'),
                'updated_at' => Carbon::create('2025', '05', '1')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'typingtest.com',
                'url' => "https://www.typingtest.com/",
                'created_at' => Carbon::create('2025', '04', '30'),
                'updated_at' => Carbon::create('2025', '04', '30')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'microsoft.com',
                'url' => "https://www.microsoft.com/th-th/",
                'created_at' => Carbon::create('2025', '04', '15'),
                'updated_at' => Carbon::create('2025', '04', '15')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'gw2efficiency.com',
                'url' => "https://gw2efficiency.com/",
                'created_at' => Carbon::create('2025', '04', '1'),
                'updated_at' => Carbon::create('2025', '04', '1')
            ],
            [
                'slug' => Str::orderedUuid(),
                'user_id' => 2,
                'name' => 'dek-d.com',
                'url' => "https://www.dek-d.com/",
                'created_at' => Carbon::create('2025', '03', '30'),
                'updated_at' => Carbon::create('2025', '03', '30')
            ],
        ]);
    }
}
