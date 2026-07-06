<?php

declare(strict_types=1);

namespace App\Actions\ContactMessage;

use App\Data\ContactMessage\ContactMessageData;
use App\Models\ContactMessage;

class StoreContactMessageAction
{
    public function handle(ContactMessageData $data): ContactMessage
    {
        return ContactMessage::query()->create([
            'name' => $data->name,
            'email' => $data->email,
            'phone' => $data->phone,
            'subject' => $data->subject,
            'message' => $data->message,
            'status' => 'new',
        ]);
    }
}
