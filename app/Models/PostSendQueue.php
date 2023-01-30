<?php

namespace App\Models;

use App\Enums\PostQueueStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $post_id
 * @property int $subscriber_id
 * @property int $status
 *
 * @method static self|Builder query()
 */
class PostSendQueue extends Model
{
    protected $table = 'post_send_queue';

    public $timestamps = false;

    protected $casts = [
        'status' => PostQueueStatus::class
    ];
}
