<?php

namespace App\Http\ViewModels\Message;

use App\Models\Channel;

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
}
