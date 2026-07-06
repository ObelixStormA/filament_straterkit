<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Partner;
use App\Models\User;

class PartnerPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('partner.view');
    }

    public function view(User $user, Partner $partner): bool
    {
        return $user->can('partner.view');
    }

    public function create(User $user): bool
    {
        return $user->can('partner.create');
    }

    public function update(User $user, Partner $partner): bool
    {
        return $user->can('partner.update');
    }

    public function delete(User $user, Partner $partner): bool
    {
        return $user->can('partner.delete');
    }
}
