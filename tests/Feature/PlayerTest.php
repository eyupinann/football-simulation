<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Player;

class PlayerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_player()
    {
        $player = Player::factory()->create();
        $this->assertDatabaseHas('players', ['id' => $player->id]);
    }

    /** @test */
    public function it_can_update_a_player()
    {
        $player = Player::factory()->create();
        $newPlayerName = 'New Player Name';
        $player->update(['player_name' => $newPlayerName]);
        $this->assertEquals($newPlayerName, $player->fresh()->player_name);
    }

    /** @test */
    public function it_can_delete_a_player()
    {
        $player = Player::factory()->create();
        $player->delete();
        $this->assertDatabaseMissing('players', ['id' => $player->id]);
    }
}
