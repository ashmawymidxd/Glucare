<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Image::factory()->count(0)->create();
        DB::table('images')->insert([
            'filename' =>  'Glucare.png',
            'imageable_id' => 1,
            'imageable_type' => 'App\Models\setting',
            'created_at' => '2021-07-01 00:00:00',
        ]);

    }
}
