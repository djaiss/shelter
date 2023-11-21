<?php

namespace App\Services;

use App\Models\Team;
use Exception;

class UpdateTeam extends BaseService
{
    public function __construct(
        public Team $team,
        public string $name,
        public bool $isPublic,
    ) {
    }

    public function execute(): Team
    {
        $this->checkTeam();
        $this->update();

        return $this->team;
    }

    private function checkTeam(): void
    {
        if (! $this->team->users->contains(auth()->user()->id)) {
            throw new Exception(__('The user is not part of the team.'));
        }
    }

    private function update(): void
    {
        $this->team->update([
            'name' => $this->name,
            'is_public' => $this->isPublic,
        ]);
    }
}
