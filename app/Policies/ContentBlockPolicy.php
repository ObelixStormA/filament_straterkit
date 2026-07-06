<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ContentBlock;
use App\Models\User;

class ContentBlockPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('content-block.view');
    }

    public function view(User $user, ContentBlock $contentBlock): bool
    {
        return $user->can('content-block.view');
    }

    public function create(User $user): bool
    {
        return $user->can('content-block.create');
    }

    public function update(User $user, ContentBlock $contentBlock): bool
    {
        return $user->can('content-block.update');
    }

    public function delete(User $user, ContentBlock $contentBlock): bool
    {
        return $user->can('content-block.delete');
    }
}
