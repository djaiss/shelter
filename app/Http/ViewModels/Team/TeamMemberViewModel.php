<?php

namespace App\Http\ViewModels\Team;

use App\Models\Team;
use App\Models\User;

class TeamMemberViewModel
{
    public static function new(Team $team): array
    {
        $usersInTeam = $team->users()->pluck('id')->toArray();

        $newUsers = $team->organization->users()
            ->whereNotIn('id', $usersInTeam)
            ->select('id', 'first_name', 'last_name', 'name_for_avatar', 'email')
            ->get()
            ->map(fn (User $user) => [
                'id' => $user->id,
                'name' => $user->name,
                'avatar' => $user->avatar,
                'email' => $user->email,
            ]);

        return [
            'team' => [
                'id' => $team->id,
                'name' => $team->name,
                'users' => $newUsers,
            ],
        ];
    }
}
