<?php

namespace Tests\Feature;

use App\Models\MatchesResult;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MatchResultTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_match_result()
    {
        $matchResult = MatchesResult::factory()->create();
        $this->assertDatabaseHas('matches_results', ['id' => $matchResult->id]);
    }

    /** @test */
    public function it_can_update_a_match_result()
    {
        $matchResult = MatchesResult::factory()->create();
        $newHomeTeamGoals = 4;
        $matchResult->update(['home_team_goals' => $newHomeTeamGoals]);
        $this->assertEquals($newHomeTeamGoals, $matchResult->fresh()->home_team_goals);
    }

    /** @test */
    public function it_can_delete_a_match_result()
    {
        $matchResult = MatchesResult::factory()->create();
        $matchResult->delete();
        $this->assertDatabaseMissing('matches_results', ['id' => $matchResult->id]);
    }
}
