<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Data\User\LoginData;
use App\Events\User\UserLoggedIn;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginUserAction
{
    /**
     * @return array{user: User, token: string}
     */
    public function handle(LoginData $data): array
    {
        $user = User::query()->where('email', $data->email)->first();

        if (! $user || ! Hash::check($data->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('api')->plainTextToken;

        UserLoggedIn::dispatch($user);

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
