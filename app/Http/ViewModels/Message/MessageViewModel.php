<?php

namespace App\Http\ViewModels\Message;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class MessageViewModel
{
    public static function index(): array
    {
        $channels = Cache::remember('channels-' . auth()->user()->id, 3600, function () use ($team) {
            return TeamMemberViewModel::index($team);
        });

        $users = Channel::where('organization_id', auth()->user()->organization_id)
            ->select('id', 'first_name', 'last_name', 'name_for_avatar')
            ->get()
            ->map(fn (User $user) => self::user($user))
            ->sortBy('name');

        return [
            'users' => $users,
        ];
    }
}
