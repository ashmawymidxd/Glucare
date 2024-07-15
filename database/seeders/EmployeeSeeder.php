<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::factory()->count(30)->create();
        DB::table('employees')->insert([
            'name' => 'ahmed hassan',
            'email' => 'uyu365656@gmail.com',
            'password' => Hash::make('ahmed1234'),
            'image_path' => 'profile.png',
            'status' => 1,
            'phone' => '01000000000',
            'employee_qualification' => 'bachelor',
            'employee_experience' => '2 years',
            'created_at' => '2021-07-01 00:00:00',
        ]);
    }
}
