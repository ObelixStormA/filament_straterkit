<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\NewsCategory;
use App\Models\User;

class NewsCategoryPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('news-category.view');
    }

    public function view(User $user, NewsCategory $newsCategory): bool
    {
        return $user->can('news-category.view');
    }

    public function create(User $user): bool
    {
        return $user->can('news-category.create');
    }

    public function update(User $user, NewsCategory $newsCategory): bool
    {
        return $user->can('news-category.update');
    }

    public function delete(User $user, NewsCategory $newsCategory): bool
    {
        return $user->can('news-category.delete');
    }
}
