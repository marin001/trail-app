<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Race;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'First_name'=>$this->faker->userName,
            'Last_name'=>$this->faker->userName,
            'Club'=>$this->faker->userName,
            'Race_ID'=>Race::factory(),
        ];
    }
}
