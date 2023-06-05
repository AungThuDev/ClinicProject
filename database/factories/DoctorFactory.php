<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'address' => $this->faker->sentence,
            'phone_no' => random_int(1,9),
            'department_id' => random_int(1,5),
        ];
    }
}
