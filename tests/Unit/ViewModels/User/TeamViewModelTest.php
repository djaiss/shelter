<?php

namespace Tests\Unit\ViewModels\User;

use App\Http\ViewModels\Team\TeamViewModel;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TeamViewModelTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_gets_the_data_needed_for_the_index_view(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $array = TeamViewModel::index();

        $this->assertCount(1, $array);
        $this->assertArrayHasKey('teams', $array);
    }

    /** @test */
    public function it_gets_the_team_object(): void
    {
        $team = Team::factory()->create([
            'name' => 'Accounting',
            'is_public' => false,
        ]);
        $array = TeamViewModel::team($team);

        $this->assertCount(3, $array);
        $this->assertEquals(
            [
                'id' => $team->id,
                'name' => 'Accounting',
                'is_public' => false,
            ],
            $array
        );
    }

    /** @test */
    public function it_gets_the_data_needed_for_the_show_view(): void
    {
        $team = Team::factory()->create([
            'name' => 'Accounting',
        ]);

        $array = TeamViewModel::show($team);

        $this->assertCount(2, $array);
        $this->assertEquals(
            [
                'id' => $team->id,
                'name' => 'Accounting',
            ],
            $array
        );
    }
}
