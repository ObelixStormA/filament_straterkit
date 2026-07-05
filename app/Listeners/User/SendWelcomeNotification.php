<?php

declare(strict_types=1);

namespace App\Listeners\User;

use App\Events\User\UserCreated;
use App\Notifications\WelcomeNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeNotification implements ShouldQueue
{
    public function handle(UserCreated $event): void
    {
        $event->user->notify(new WelcomeNotification);
    }
}
