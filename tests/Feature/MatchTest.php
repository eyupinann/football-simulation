<?php

namespace Tests\Feature;

use App\Models\Matches;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MatchTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_match()
    {
        $match = Matches::factory()->create();
        $this->assertDatabaseHas('matches', ['id' => $match->id]);
    }

    /** @test */
    public function it_can_update_a_match()
    {
        $match = Matches::factory()->create();
        $newStage = 'new_stage';
        $match->update(['stage' => $newStage]);
        $this->assertEquals($newStage, $match->fresh()->stage);
    }

    /** @test */
    public function it_can_delete_a_match()
    {
        $match = Matches::factory()->create();
        $match->delete();
        $this->assertDatabaseMissing('matches', ['id' => $match->id]);
    }
}
