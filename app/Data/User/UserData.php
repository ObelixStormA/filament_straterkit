<?php

declare(strict_types=1);

namespace App\Data\User;

use Spatie\LaravelData\Data;

class UserData extends Data
{
    /**
     * @param  array<int, string>  $roles
     */
    public function __construct(
        public string $name,
        public string $email,
        public ?string $password,
        public array $roles,
    ) {}
}
