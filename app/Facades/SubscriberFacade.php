<?php

namespace App\Facades;

use App\Models\Subscriber;
use App\Services\SubscriberService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Subscriber subscribe(array $data)
 *
 * @see SubscriberService
 */
class SubscriberFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return SubscriberService::class;
    }
}
