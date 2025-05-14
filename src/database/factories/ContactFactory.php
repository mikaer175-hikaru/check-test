<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->randomElement(['男性', '女性']),
            'email' => $this->faker->unique()->safeEmail,
            'tel' => $this->faker->numerify('#####'), // 5桁数字
            'address' => $this->faker->address,
            'category_id' => $this->faker->numberBetween(1, 5),
            'message' => $this->faker->text(100),
        ];
    }
}
