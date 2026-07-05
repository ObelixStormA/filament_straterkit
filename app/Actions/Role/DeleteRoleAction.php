<?php

declare(strict_types=1);

namespace App\Actions\Role;

use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class DeleteRoleAction
{
    public const PROTECTED_ROLES = ['super-admin'];

    public function handle(Role $role): void
    {
        if (in_array($role->name, self::PROTECTED_ROLES, true)) {
            throw ValidationException::withMessages([
                'name' => "The \"{$role->name}\" role cannot be deleted.",
            ]);
        }

        $role->delete();
    }
}
