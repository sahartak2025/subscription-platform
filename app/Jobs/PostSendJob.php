<?php

namespace App\Jobs;

use App\Enums\PostQueueStatus;
use App\Mail\NewPostMail;
use App\Models\Post;
use App\Models\PostSendQueue;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Throwable;

class PostSendJob implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $postId;

    protected int $subscriberId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $postId, int $subscriberId)
    {
        $this->postId = $postId;
        $this->subscriberId = $subscriberId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        $post = Post::query()->find($this->postId);
        $subscriber = Subscriber::query()->find($this->subscriberId);
        $postSendQueue = PostSendQueue::query()
            ->where('post_id', $post->id)
            ->where('subscriber_id', $subscriber->id)
            ->first();


        try {
            Mail::to($subscriber->email)
                ->send(new NewPostMail($post));

            $postSendQueue->delete();
        } catch (Throwable $exception) {
            $postSendQueue->status = PostQueueStatus::New;
            $postSendQueue->save();
        }

    }
}
