<?php

namespace App\Http\Controllers\Api;

use App\Facades\PostFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function createPost(CreatePostRequest $createPostRequest): JsonResponse
    {
        return response()->json(PostFacade::createPost($createPostRequest->validated()));
    }
}
