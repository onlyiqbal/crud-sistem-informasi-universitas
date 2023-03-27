<?php

namespace Database\Factories;

use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nim' => $this->faker->unique()->numerify('10######'),
            'nama' => $this->faker->firstName() . " " . $this->faker->lastName(),
            'jurusan_id' => $this->faker->numberBetween(1, Jurusan::count())
        ];
    }
}
