<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        DB::table('admins')->insert([
            'name' => 'ahmed hassan shehata',
            'email' => 'uyu365656@gmail.com',
            'password' => Hash::make('ahmed1234'),
            'image_path' => 'profile.png',
            'status' => 'active',
            'phone' => '01000000000',
            'created_at' => '2021-07-01 00:00:00',
        ]);
    }
}
