<?php

namespace Database\Factories;

use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Section::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name'=>$this ->faker->unique()->randomElement(['Brain and Nerves Department','Surgery Department','Pediatrics Department','Obstetrics and Gynecology Department','Ophthalmology Department','Internal Department']),
            'description'=>$this->faker->paragraph,
            'created_at' => '2024-02-07 00:00:00',
        ];
    }
}
