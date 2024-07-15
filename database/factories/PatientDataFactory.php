<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PatientData>
 */
class PatientDataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'users_id' => $this->faker->numberBetween(1,1), // Assuming users_id is a foreign key to users table
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'age' => $this->faker->numberBetween(18, 80),
            'hypertension' => $this->faker->boolean,
            'heart_disease' => $this->faker->boolean,
            'smoking_history' => $this->faker->randomElement(['never', 'occasional', 'regular']),
            'bmi' => $this->faker->randomFloat(18, 40),
            'HbA1c_level' => $this->faker->randomFloat(4, 10),
            'blood_glucose_level' => $this->faker->numberBetween(70, 300),
            'created_at' => '2021-07-01 00:00:00',
        ];
    }
}
