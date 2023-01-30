<?php

namespace App\Console\Commands;

use App\Enums\PostQueueStatus;
use App\Jobs\PostSendJob;
use App\Models\PostSendQueue;
use Illuminate\Console\Command;

class SendPostEmailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:post-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send new posts emails to subscribers';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $postSendQueue = PostSendQueue::query()
            ->where('status', PostQueueStatus::New)
            ->get();

        foreach ($postSendQueue as $item) {
            PostSendJob::dispatch($item->post_id, $item->subscriber_id)->onQueue('send-emails');
            $item->status = PostQueueStatus::Pending;
            $item->save();
        }

        return Command::SUCCESS;
    }
}
