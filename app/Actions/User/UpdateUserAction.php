<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Data\User\UserData;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class UpdateUserAction
{
    public function handle(User $user, UserData $data, UploadedFile|string|null $avatar = null): User
    {
        return DB::transaction(function () use ($user, $data, $avatar): User {
            $user->fill([
                'name' => $data->name,
                'email' => $data->email,
            ]);

            if (filled($data->password)) {
                $user->password = $data->password;
            }

            $user->save();
            $user->syncRoles($data->roles);

            $this->storeAvatar($user, $avatar);

            return $user;
        });
    }

    private function storeAvatar(User $user, UploadedFile|string|null $avatar): void
    {
        if ($avatar === null) {
            return;
        }

        if ($avatar instanceof UploadedFile) {
            $user->addMedia($avatar)->toMediaCollection(User::AVATAR_COLLECTION);

            return;
        }

        $user->addMediaFromDisk($avatar, 'public')->toMediaCollection(User::AVATAR_COLLECTION);
    }
}
