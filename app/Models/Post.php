<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Ramsey\Collection\Collection;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $website_id
 *
 * @property Website $website
 * @property Subscriber[]|Collection $queuedSubscribers
 *
 *  @method static self|Builder query()
 */
class Post extends Model
{
    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }

    public function queuedSubscribers(): BelongsToMany
    {
        return $this->belongsToMany(Subscriber::class, 'post_send_queue')
            ->withPivot(['status']);
    }
}
