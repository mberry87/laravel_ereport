<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BenderaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->country(),
            'keterangan' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
