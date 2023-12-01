<?php

namespace App\Services;

use App\Models\Channel;
use App\Models\Topic;

class CreateTopic extends BaseService
{
    private Topic $topic;

    public function __construct(
        public Channel $channel,
        public string $title,
        public ?string $content,
    ) {
    }

    public function execute(): Topic
    {
        $this->create();
        $this->incrementTopicsCount();

        return $this->topic;
    }

    private function create(): void
    {
        $this->topic = Topic::create([
            'organization_id' => auth()->user()->organization_id,
            'user_id' => auth()->user()->id,
            'channel_id' => $this->channel->id,
            'title' => $this->title,
            'content' => $this->content,
        ]);
    }

    private function incrementTopicsCount(): void
    {
        $this->channel->increment('topics_count');
    }
}
