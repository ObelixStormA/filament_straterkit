<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\AdmissionStep;
use App\Models\User;

class AdmissionStepPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('admission-step.view');
    }

    public function view(User $user, AdmissionStep $admissionStep): bool
    {
        return $user->can('admission-step.view');
    }

    public function create(User $user): bool
    {
        return $user->can('admission-step.create');
    }

    public function update(User $user, AdmissionStep $admissionStep): bool
    {
        return $user->can('admission-step.update');
    }

    public function delete(User $user, AdmissionStep $admissionStep): bool
    {
        return $user->can('admission-step.delete');
    }
}
