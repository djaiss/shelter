<?php

namespace Tests\Browser\Team;

use App\Models\Team;
use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TeamsTest extends DuskTestCase
{
    /** @test */
    public function it_lists_all_the_teams(): void
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user): void {
            $browser->loginAs($user)
                ->visit('/teams')
                ->click('@add-team-cta')
                ->type('group-name', 'Accounting')
                ->radio('visibility', '0')
                ->click('@submit-form-button')
                ->assertPathIs('/teams/' . Team::latest()->first()->id)
                ->assertSee('Accounting');
        });
    }
}
