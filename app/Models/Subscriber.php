<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Ramsey\Collection\Collection;

/**
 * @property int $id
 * @property string $email
 * @property int $website_id
 *
 * @property Website[]|Collection $websites
 * @property Post[]|Collection $waitingPosts
 *
 * @method static self|Builder query()
 */
class Subscriber extends Model
{
    public function websites(): BelongsToMany
    {
        return $this->belongsToMany(Website::class, 'website_to_subscriber');
    }

    public function waitingPosts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_send_queue')
            ->withPivot(['status']);
    }
}
