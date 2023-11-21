<?php

namespace App\Http\ViewModels\Team;

use App\Models\Team;

class TeamViewModel
{
    public static function index(): array
    {
        $teams = Team::where('organization_id', auth()->user()->organization_id)
            ->select('id', 'name', 'is_public')
            ->get()
            ->map(fn (Team $team) => self::team($team))
            ->sortBy('name');

        return [
            'teams' => $teams,
        ];
    }

    public static function team(Team $team): array
    {
        return [
            'id' => $team->id,
            'name' => $team->name,
            'is_public' => $team->is_public,
        ];
    }

    public static function show(Team $team): array
    {
        return [
            'id' => $team->id,
            'name' => $team->name,
            'is_public' => $team->is_public,
        ];
    }
}
