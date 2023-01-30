<?php

namespace App\Http\Controllers\Api;

use App\Facades\SubscriberFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribeRequest;
use Illuminate\Http\JsonResponse;

class SubscriberController extends Controller
{
    public function subscribe(SubscribeRequest $subscribeRequest): JsonResponse
    {
        return response()->json(SubscriberFacade::subscribe($subscribeRequest->validated()));
    }
}
