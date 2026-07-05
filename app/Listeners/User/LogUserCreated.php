<?php

declare(strict_types=1);

namespace App\Listeners\User;

use App\Events\User\UserCreated;

class LogUserCreated
{
    public function handle(UserCreated $event): void
    {
        activity('user')
            ->performedOn($event->user)
            ->causedBy(auth()->user())
            ->event('created')
            ->log('User account was created');
    }
}
