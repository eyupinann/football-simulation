<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Team;

class TeamTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_team()
    {
        $team = Team::factory()->create();
        $this->assertDatabaseHas('teams', ['id' => $team->id]);
    }

    /** @test */
    public function it_can_update_a_team()
    {
        $team = Team::factory()->create();
        $newTeamName = 'New Team Name';
        $team->update(['team_name' => $newTeamName]);
        $this->assertEquals($newTeamName, $team->fresh()->team_name);
    }

    /** @test */
    public function it_can_delete_a_team()
    {
        $team = Team::factory()->create();
        $team->delete();
        $this->assertDatabaseMissing('teams', ['id' => $team->id]);
    }
}
