<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::factory()->count(30)->create();
        DB::table('users')->insert([
            'name' => 'sayed ahmed zare',
            'email' => 'uyu365666@gmail.com',
            'password' => Hash::make('sayed1234'),
            'status' => 'active',
            'phone' => '01000000000',
            'created_at' => '2021-07-01 00:00:00',
        ]);
    }
}
