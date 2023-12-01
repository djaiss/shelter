<?php

namespace Tests\Unit\ViewModels\Message;

use App\Http\ViewModels\Message\TopicViewModel;
use App\Models\Channel;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TopicViewModelTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_gets_the_data_needed_for_creating_a_topic(): void
    {
        $user = User::factory()->create();
        $channel = Channel::factory()->create([
            'organization_id' => $user->organization_id,
            'name' => 'Accounting',
            'description' => 'Accounting channel',
            'is_public' => true,
        ]);
        $user->channels()->attach($channel);
        $this->actingAs($user);

        $array = TopicViewModel::new($channel);

        $this->assertEquals(
            [
                'id' => $channel->id,
                'name' => 'Accounting',
                'url' => [
                    'show' => env('APP_URL') . '/messages/channels/' . $channel->id,
                    'store' => env('APP_URL') . '/messages/channels/' . $channel->id . '/topics',
                ],
            ],
            $array['channel']
        );
        $this->assertEquals(
            [
                'avatar' => $user->avatar,
            ],
            $array['user']
        );
    }
}
