<?php

declare(strict_types=1);

namespace App\Data\AdmissionApplication;

use Spatie\LaravelData\Data;

class AdmissionApplicationData extends Data
{
    public function __construct(
        public string $first_name,
        public string $last_name,
        public int $birth_year,
        public string $phone,
        public ?string $email,
        public ?int $program_id,
        public ?string $message,
    ) {}
}
