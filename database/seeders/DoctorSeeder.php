<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctor::factory()->count(30)->create();
        DB::table('doctors')->insert([
            'name' => 'ahmed hassan',
            'email' => 'uyu365656@gmail.com',
            'password' => Hash::make('ahmed1234'),
            'section_id' => Section::all()->random()->id,
            'status' => 1,
            'phone' => '01000000000',
            'speciality' => 'surgery',
            'qualification' => 'master',
            'experience' => '5 years',
            'created_at' => '2021-07-01 00:00:00',
        ]);
    }
}
