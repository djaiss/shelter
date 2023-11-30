<?php

namespace App\Services;

use App\Models\Topic;

class CreateTopic extends BaseService
{
    private Topic $topic;

    public function __construct(
        public string $title,
        public ?string $content,
    ) {
    }

    public function execute(): Topic
    {
        $this->create();

        return $this->topic;
    }

    private function create(): void
    {
        $this->topic = Topic::create([
            'organization_id' => auth()->user()->organization_id,
            'user_id' => auth()->user()->id,
            'title' => $this->title,
            'content' => $this->content,
        ]);
    }
}
