<?php

namespace App\Http\ViewModels\Message;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class UserChannelViewModel
{
    /**
     * List of channels for the current user.
     * This is displayed in the left sidebar.
     *
     * @return mixed
     */
    public static function index(): mixed
    {
        $channels = Cache::remember('channels-' . auth()->user()->id, 3600, function () {
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

        return $channels;
    }
}
