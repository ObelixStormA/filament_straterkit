<?php

declare(strict_types=1);

namespace App\Actions\User;

use App\Data\User\UserData;
use App\Events\User\UserCreated;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class CreateUserAction
{
    public function handle(UserData $data, UploadedFile|string|null $avatar = null): User
    {
        return DB::transaction(function () use ($data, $avatar): User {
            $user = User::query()->create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password,
            ]);

            $user->syncRoles($data->roles);

            $this->storeAvatar($user, $avatar);

            UserCreated::dispatch($user);

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
