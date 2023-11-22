<?php

namespace Tests\Feature\Team;

use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManageTeamTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_lists_teams(): void
    {
        $team = Team::factory()->create([
            'name' => 'Accounting',
        ]);
        $user = User::factory()->create([
            'organization_id' => $team->organization_id,
        ]);

        $this->actingAs($user)
            ->get('/teams')
            ->assertSee('Accounting');
    }

    /** @test */
    public function a_user_can_create_a_team(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/teams', [
                'group-name' => 'Accounting',
                'visibility' => false,
            ])
            ->assertStatus(302)
            ->assertRedirectToRoute('team.show', ['team' => Team::latest()->first()->id]);
    }
}
