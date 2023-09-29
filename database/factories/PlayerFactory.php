<?php
namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Player;

class PlayerFactory extends Factory
{
    protected $model = Player::class;

    public function definition()
    {
        return [
            'player_name' => $this->faker->name,
            'team_key' => Team::factory()->create()->key, // Team modeline bağlı olarak takım anahtarını alır
            'strength' => $this->faker->numberBetween(0, 100),
        ];
    }
}

