<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\AdmissionKeyDate;
use App\Models\User;

class AdmissionKeyDatePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('admission-key-date.view');
    }

    public function view(User $user, AdmissionKeyDate $admissionKeyDate): bool
    {
        return $user->can('admission-key-date.view');
    }

    public function create(User $user): bool
    {
        return $user->can('admission-key-date.create');
    }

    public function update(User $user, AdmissionKeyDate $admissionKeyDate): bool
    {
        return $user->can('admission-key-date.update');
    }

    public function delete(User $user, AdmissionKeyDate $admissionKeyDate): bool
    {
        return $user->can('admission-key-date.delete');
    }
}
