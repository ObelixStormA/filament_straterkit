<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\AdmissionDocument;
use App\Models\User;

class AdmissionDocumentPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('admission-document.view');
    }

    public function view(User $user, AdmissionDocument $admissionDocument): bool
    {
        return $user->can('admission-document.view');
    }

    public function create(User $user): bool
    {
        return $user->can('admission-document.create');
    }

    public function update(User $user, AdmissionDocument $admissionDocument): bool
    {
        return $user->can('admission-document.update');
    }

    public function delete(User $user, AdmissionDocument $admissionDocument): bool
    {
        return $user->can('admission-document.delete');
    }
}
