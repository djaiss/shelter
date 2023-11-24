<?php

namespace App\Http\ViewModels\Team;

use App\Models\Team;

class TeamViewModel
{
    public static function index(): array
    {
        $teams = Team::where('organization_id', auth()->user()->organization_id)
            ->select('id', 'name', 'is_public', 'last_active_at')
            ->withCount('users')
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
            'count' => $team->users_count,
            'last_active_at' => $team->last_active_at->diffForHumans(),
        ];
    }

    public static function show(Team $team): array
    {
        return [
            'id' => $team->id,
            'name' => $team->name,
            'is_public' => $team->is_public,
            'description' => $team->description,
            'show_actions' => auth()->user()->settings_team_show_actions,
            'url' => [
                'toggle_actions' => route('team.toggle.update', [
                    'team' => $team->id,
                    'setting' => 'settings_team_show_actions',
                ]),
            ],
        ];
    }

    public static function edit(Team $team): array
    {
        return [
            'id' => $team->id,
            'name' => $team->name,
            'is_public' => $team->is_public,
            'description' => $team->description,
        ];
    }
}
