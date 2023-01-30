<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $name
 * @property string $url
 *
 * @property Subscriber[]|Collection $subscribers
 * @property Post[]|Collection $posts
 *
 * @method static static|Builder query()
 */
class Website extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany(Subscriber::class, 'website_to_subscriber');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
