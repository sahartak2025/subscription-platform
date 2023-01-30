<?php

namespace App\Facades;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Post createPost(array $data)
 *
 * @see PostService
 */
class PostFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return PostService::class;
    }
}
