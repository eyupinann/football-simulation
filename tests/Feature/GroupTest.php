<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Group;

class GroupTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_group()
    {
        $group = Group::factory()->create();
        $this->assertDatabaseHas('groups', ['id' => $group->id]);
    }

    /** @test */
    public function it_can_update_a_group()
    {
        $group = Group::factory()->create();
        $newGroupName = 'New Group Name';
        $group->update(['group_name' => $newGroupName]);
        $this->assertEquals($newGroupName, $group->fresh()->group_name);
    }

    /** @test */
    public function it_can_delete_a_group()
    {
        $group = Group::factory()->create();
        $group->delete();
        $this->assertDatabaseMissing('groups', ['id' => $group->id]);
    }
}
