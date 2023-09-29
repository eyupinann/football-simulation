<?php
namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Matches;

class MatchesFactory extends Factory
{
    protected $model = Matches::class;

    public function definition()
    {
        return [
            'home_team_id' => Team::factory()->create()->id,
            'away_team_id' => Team::factory()->create()->id,
            'stage' => $this->faker->randomElement(['group', 'round_of_16', 'quarter_final', 'semi_final', 'final']),
            'date' => $this->faker->date,
        ];
    }
}

