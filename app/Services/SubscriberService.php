<?php

namespace App\Services;

use App\Models\Subscriber;
use App\Models\Website;

class SubscriberService
{
    public function subscribe(array $data): Subscriber
    {
        $website = Website::query()->find($data['website_id']);

        $subscriber = Subscriber::query()->where('email', $data['email'])->first();
        if (!$subscriber) {
            $subscriber = new Subscriber();
            $subscriber->email = $data['email'];
            $subscriber->save();
            $subscriber->refresh();
        }

        $website->subscribers()->sync([$subscriber->id]);

        return $subscriber;
    }
}
