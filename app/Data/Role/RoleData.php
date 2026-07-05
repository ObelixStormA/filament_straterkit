<?php

declare(strict_types=1);

namespace App\Data\Role;

use Spatie\LaravelData\Data;

class RoleData extends Data
{
    /**
     * @param  array<int, string>  $permissions
     */
    public function __construct(
        public string $name,
        public array $permissions,
    ) {}
}
