<?php

namespace Tests\Feature\Settings;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManageProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_page_lets_the_user_edit_the_profile(): void
    {
        $user = User::factory()->create([
            'first_name' => 'henri',
            'last_name' => 'troyat',
            'email' => 'henri@troyat.com',
        ]);

        $this->actingAs($user)
            ->get('/settings/profile')
            ->assertSee('henri')
            ->post('/settings/profile', [
                'first_name' => 'celine',
                'last_name' => 'troyat',
                'email' => 'henri@troyat.com',
            ])
            ->assertRedirectToRoute('settings.profile.index')
            ->assertSee('celine');
    }
}
