<?php

namespace Tests\Unit\ViewModels\User;

use App\Http\ViewModels\Team\TeamViewModel;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
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
        Carbon::setTestNow(Carbon::create(2018, 1, 1));
        $team = Team::factory()->create([
            'name' => 'Accounting',
            'is_public' => false,
            'last_active_at' => '2021-01-01 00:00:00',
        ]);
        $array = TeamViewModel::team($team);

        $this->assertCount(5, $array);
        $this->assertEquals(
            [
                'id' => $team->id,
                'name' => 'Accounting',
                'is_public' => false,
                'count' => null,
                'last_active_at' => '3 years from now',
            ],
            $array
        );
    }

    /** @test */
    public function it_gets_the_data_needed_for_the_show_view(): void
    {
        $user = User::factory()->create([
            'settings_team_show_actions' => true,
        ]);
        $team = Team::factory()->create([
            'name' => 'Accounting',
            'is_public' => false,
        ]);
        $this->actingAs($user);

        $array = TeamViewModel::show($team, true);

        $this->assertCount(7, $array);
        $this->assertEquals(
            [
                'id' => $team->id,
                'name' => 'Accounting',
                'is_public' => false,
                'is_part_of_team' => true,
                'show_actions' => true,
                'description' => null,
                'url' => [
                    'toggle_actions' => env('APP_URL') . '/teams/' . $team->id . '/toggleSettings/settings_team_show_actions',
                ],
            ],
            $array
        );
    }

    /** @test */
    public function it_gets_the_data_needed_for_the_edit_view(): void
    {
        $team = Team::factory()->create([
            'name' => 'Accounting',
            'is_public' => false,
        ]);

        $array = TeamViewModel::edit($team);

        $this->assertCount(4, $array);
        $this->assertEquals(
            [
                'id' => $team->id,
                'name' => 'Accounting',
                'is_public' => false,
                'description' => null,
            ],
            $array
        );
    }
}
