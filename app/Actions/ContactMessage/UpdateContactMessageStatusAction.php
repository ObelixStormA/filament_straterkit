<?php

declare(strict_types=1);

namespace App\Actions\ContactMessage;

use App\Models\ContactMessage;

class UpdateContactMessageStatusAction
{
    public function handle(ContactMessage $contactMessage, string $status): ContactMessage
    {
        $contactMessage->update(['status' => $status]);

        return $contactMessage;
    }
}
