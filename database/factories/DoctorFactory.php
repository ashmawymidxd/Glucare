<?php

namespace Database\Factories;
use App\Models\Section;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
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
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'status' => 1,
            'phone' => $this->faker->phoneNumber,
            'speciality' => $this->faker->word,
            'qualification' => $this->faker->word,
            'experience' => $this->faker->word,
            'section_id' => Section::all()->random()->id,
            'created_at' => '2024-02-07 00:00:00',
        ];
    }
}
