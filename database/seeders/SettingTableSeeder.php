<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();
        DB::table('settings')->insert([
            'website_name' => 'GluCare',
            'website_logo' => 'glucare.png',
            'website_favicon' => 'main_icon.png',
            'website_description' => ' AI algorithms can analyze an individuals diet preferences, limitations,
            and health goals to generate personalized meal plans.
            These plans can be designed to help stabilize blood sugar levels,
            control carbohydrate consumption, and promote overall health.
            Web applications can integrate with glucose monitors to track and
            display blood sugar levels in real time. This information helps
            individuals with diabetes and their healthcare providers make
            informed decisions about their treatment plans.',
            'website_email' => 'uyu365656@gmail.com',
            'website_phone' => '01000000000',
            'website_address' => 'Cairo',
            'website_facebook' => 'https://www.facebook.com/',
            'website_twitter' => 'https://twitter.com/',
            'website_instagram' => 'https://www.instagram.com/',
            'website_youtube' => 'https://www.youtube.com/',
            'website_whatsapp' => 'https://web.whatsapp.com/',
            'created_at' => '2021-07-01 00:00:00',
        ]);
    }
}
