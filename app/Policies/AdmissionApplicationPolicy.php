<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\AdmissionApplication;
use App\Models\User;

class AdmissionApplicationPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('admission-application.view');
    }

    public function view(User $user, AdmissionApplication $admissionApplication): bool
    {
        return $user->can('admission-application.view');
    }

    public function update(User $user, AdmissionApplication $admissionApplication): bool
    {
        return $user->can('admission-application.update');
    }

    public function delete(User $user, AdmissionApplication $admissionApplication): bool
    {
        return $user->can('admission-application.delete');
    }
}
