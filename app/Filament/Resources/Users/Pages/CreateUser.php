<?php

declare(strict_types=1);

namespace App\Filament\Resources\Users\Pages;

use App\Actions\User\CreateUserAction;
use App\Data\User\UserData;
use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $avatar = Arr::pull($data, 'avatar');

        $userData = UserData::from([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'] ?? null,
            'roles' => $data['roles'] ?? [],
        ]);

        return app(CreateUserAction::class)->handle($userData, $avatar);
    }
}
