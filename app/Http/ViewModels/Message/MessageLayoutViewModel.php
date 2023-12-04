<?php

namespace App\Http\ViewModels\Message;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class MessageLayoutViewModel
{
    /**
     * List of channels for the current user.
     * This is displayed in the left sidebar.
     */
    public static function index(): array
    {
        $channels = Cache::remember('user:' . auth()->user()->id . ':channels', 604800, function () {
            return auth()->user()
                ->channels()
                ->select('channels.id', 'name', 'is_public')
                ->get()
                ->map(fn (Channel $channel) => [
                    'id' => $channel->id,
                    'name' => $channel->name,
                    'is_public' => $channel->is_public,
                    'url' => [
                        'show' => route('channel.show', [
                            'channel' => $channel->id,
                        ]),
                    ],
                ]);
        });

        return [
            'channels' => $channels,
        ];
    }
}
