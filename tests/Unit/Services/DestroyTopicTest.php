<?php

namespace Tests\Unit\Services;

use App\Models\Topic;
use App\Services\DestroyTopic;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class DestroyTopicTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_destroys_a_topic(): void
    {
        $topic = Topic::factory()->create();

        (new DestroyTopic(
            topic: $topic,
        ))->execute();

        $this->assertDatabaseMissing('topics', [
            'id' => $topic->id,
        ]);
    }
}
