<?php

namespace App\Services;

use App\Events\PostCreated;
use App\Models\Post;

class PostService
{
    public function createPost(array $data): Post
    {
        $post = new Post();
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->website_id = $data['website_id'];

        $post->save();
        $post->refresh();

        event(new PostCreated($post));

        return $post;
    }
}
