<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PelabuhanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->word(),
            'kode' => $this->faker->randomNumber(5, true),
            'keterangan' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        ];
    }
}
