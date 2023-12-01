<?php

namespace Tests\Feature\Team;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManageChannelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_see_public_and_private_channels_he_belongs_to(): void
    {
        $channel = Channel::factory()->create([
            'name' => 'Accounting',
        ]);
        Channel::factory()->create([
            'name' => 'Engineering team',
            'organization_id' => $channel->organization_id,
            'is_public' => true,
        ]);
        Channel::factory()->create([
            'name' => 'Marketing team',
            'organization_id' => $channel->organization_id,
            'is_public' => false,
        ]);
        Channel::factory()->create([
            'name' => 'Sales team',
            'is_public' => true,
        ]);
        $user = User::factory()->create([
            'organization_id' => $channel->organization_id,
        ]);
        $user->channels()->attach($channel);

        $this->actingAs($user)
            ->get('/messages')
            ->assertSee('Accounting')
            ->assertDontSee('Engineering team')
            ->assertDontSee('Marketing team')
            ->assertDontSee('Sales team');
    }

    /** @test */
    public function a_user_can_create_a_channel(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/messages/channels', [
                'channel-name' => 'Accounting',
                'description' => 'Accounting channel',
                'visibility' => true,
            ])
            ->assertStatus(302)
            ->assertRedirectToRoute('channel.show', [
                'channel' => Channel::latest()->first()->id,
            ]);
    }
}
