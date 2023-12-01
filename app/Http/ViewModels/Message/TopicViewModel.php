<?php

namespace App\Http\ViewModels\Message;

use App\Models\Channel;
use App\Models\Topic;

class TopicViewModel
{
    public static function new(Channel $channel): array
    {
        return [
            'channel' => [
                'id' => $channel->id,
                'name' => $channel->name,
                'url' => [
                    'show' => route('channel.show', [
                        'channel' => $channel->id,
                    ]),
                    'store' => route('topic.store', [
                        'channel' => $channel->id,
                    ]),
                ],
            ],
            'user' => [
                'avatar' => auth()->user()->avatar,
            ],
        ];
    }

    public static function show(Channel $channel, Topic $topic): array
    {
        return [
            'channel' => [
                'id' => $channel->id,
                'name' => $channel->name,
                'url' => [
                    'show' => route('channel.show', [
                        'channel' => $channel->id,
                    ]),
                ],
            ],
            'topic' => [
                'id' => $topic->id,
                'title' => $topic->title,
                'content' => $topic->content,
                'user' => [
                    'id' => $topic->user->id,
                    'name' => $topic->user->name,
                    'avatar' => $topic->user->avatar,
                    'url' => [
                        'show' => route('user.show', [
                            'user' => $topic->user->id,
                        ]),
                    ],
                ],
            ],
            'user' => [
                'avatar' => auth()->user()->avatar,
            ],
        ];
    }
}
