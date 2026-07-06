<?php

declare(strict_types=1);

namespace App\Data\ContactMessage;

use Spatie\LaravelData\Data;

class ContactMessageData extends Data
{
    public function __construct(
        public string $name,
        public ?string $email,
        public ?string $phone,
        public ?string $subject,
        public string $message,
    ) {}
}
