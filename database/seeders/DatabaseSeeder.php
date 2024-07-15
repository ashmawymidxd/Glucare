<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminTableSeeder::class,
            SectionSeeder::class,
            DoctorSeeder::class,
            EmployeeSeeder::class,
            UserTableSeeder::class,
            SettingTableSeeder::class,
            PatientDataSeeder::class,
            AppointmentSeeder::class,
            ImageTableSeeder::class,
            UserAppointmentSeeder::class,
            // PatientTableSeeder::class,
            // RayEmployeeTableSeeder::class,
            // ServiceTableSeeder::class,
        ]);
    }
}
