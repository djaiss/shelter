<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LocaleTest extends DuskTestCase
{
    /** @test */
    public function it_toggles_the_language(): void
    {
        $this->browse(function (Browser $browser): void {
            $browser->visit('/login')
                ->assertSee('LOG IN')
                ->click('@locale-switch-french')
                ->assertSee('SE CONNECTER')
                ->click('@locale-switch-english')
                ->assertSee('LOG IN');
        });
    }
}
