<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAppointment>
 */
class UserAppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'doctor_id' => \App\Models\Doctor::all()->random()->id,
            'section_id' => \App\Models\Section::all()->random()->id,
            'patient_id' => \App\Models\User::all()->random()->id,
            'appointment_date' => $this->faker->date(),
            'appointment_time' => $this->faker->Time(),
        ];
    }
}
