<?php

namespace Tests\Unit\Models;

use App\Models\Topic;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TopicTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_belongs_to_one_organization(): void
    {
        $topic = Topic::factory()->create();
        $this->assertTrue($topic->organization()->exists());
    }

    /** @test */
    public function it_belongs_to_one_user(): void
    {
        $topic = Topic::factory()->create();
        $this->assertTrue($topic->user()->exists());
    }
}
