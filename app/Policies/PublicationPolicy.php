<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Publication;
use App\Models\User;

class PublicationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('publication.view');
    }

    public function view(User $user, Publication $publication): bool
    {
        return $user->can('publication.view');
    }

    public function create(User $user): bool
    {
        return $user->can('publication.create');
    }

    public function update(User $user, Publication $publication): bool
    {
        return $user->can('publication.update');
    }

    public function delete(User $user, Publication $publication): bool
    {
        return $user->can('publication.delete');
    }
}
