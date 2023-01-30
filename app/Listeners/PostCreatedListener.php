<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreatedListener implements ShouldQueue
{
    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public ?string $queue = 'post-created';

    /**
     * Handle the event.
     *
     * @param PostCreated $event
     * @return void
     */
    public function handle(PostCreated $event): void
    {
        $post = $event->post;
        $subscriberIds = $post->website->subscribers->pluck('id')->toArray();

        $post->queuedSubscribers()
            ->attach($subscriberIds);
    }
}
