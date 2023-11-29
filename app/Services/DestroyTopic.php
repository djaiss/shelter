<?php

namespace App\Services;

use App\Models\Topic;

class DestroyTopic extends BaseService
{
    public function __construct(
        public Topic $topic,
    ) {
    }

    public function execute(): void
    {
        $this->destroy();
    }

    public function destroy(): void
    {
        $this->topic->delete();
    }
}
