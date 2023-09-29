<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Team;

class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition()
    {
        return [
            'team_name' => $this->faker->name,
            'key' => $this->faker->unique()->slug,
            'strength' => $this->faker->numberBetween(0, 100),
            'country_code' => $this->faker->countryCode,
            'points' => $this->faker->numberBetween(0, 100),
        ];
    }
}

