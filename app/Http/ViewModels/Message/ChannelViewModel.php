<?php

namespace App\Http\ViewModels\Message;

use App\Models\Channel;
use App\Models\Topic;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ChannelViewModel
{
    public static function show(Channel $channel): array
    {
        $topics = Cache::remember('channel-' . $channel->id . '-user-' . auth()->user()->id, 3600, function () use ($channel) {
            return $channel->topics()
                ->with('user')
                ->orderBy('created_at', 'desc')
                ->get()
                ->map(fn (Topic $topic) => [
                    'id' => $topic->id,
                    'title' => $topic->title,
                    'content' => Str::words($topic->content, 20, '...'),
                    'user' => [
                        'avatar' => $topic->user->avatar,
                    ],
                    'created_at' => $topic->created_at->format('Y/m/d'),
                    'created_at_human_format' => $topic->created_at->diffForHumans(),
                    'url' => [
                        'show' => route('topic.show', [
                            'channel' => $channel->id,
                            'topic' => $topic->id,
                        ]),
                    ],
                ]);
        });

        return [
            'id' => $channel->id,
            'name' => $channel->name,
            'description' => $channel->description,
            'is_public' => $channel->is_public,
            'topics' => $topics,
            'url' => [
                'new' => route('topic.new', [
                    'channel' => $channel->id,
                ]),
            ],
        ];
    }
}
