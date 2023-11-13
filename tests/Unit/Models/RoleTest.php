<?php

namespace Tests\Unit\Models;

use App\Models\Level;
use App\Models\Role;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_belongs_to_one_organization(): void
    {
        $role = Role::factory()->create();
        $this->assertTrue($role->organization()->exists());
    }

    /** @test */
    public function it_has_many_levels(): void
    {
        $role = Role::factory()->create();
        Level::factory()->create(['role_id' => $role->id]);

        $this->assertTrue($role->levels()->exists());
    }
}
