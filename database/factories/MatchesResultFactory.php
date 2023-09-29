<?php
namespace Database\Factories;

use App\Models\Matches;
use App\Models\MatchesResult;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatchesResultFactory extends Factory
{
    protected $model = MatchesResult::class;

    public function definition()
    {
        return [
            'match_id' => Matches::factory()->create()->id, // Rastgele bir maç oluşturur
            'home_team_goals' => $this->faker->numberBetween(0, 10),
            'away_team_goals' => $this->faker->numberBetween(0, 10),
        ];
    }
}

