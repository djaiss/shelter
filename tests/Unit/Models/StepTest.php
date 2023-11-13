<?php

namespace Tests\Unit\Models;

use App\Models\Step;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class StepTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_belongs_to_one_role(): void
    {
        $step = Step::factory()->create();
        $this->assertTrue($step->role()->exists());
    }
}
