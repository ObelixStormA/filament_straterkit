<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Actions\User\CreateUserAction;
use App\Actions\User\DeleteUserAction;
use App\Actions\User\UpdateUserAction;
use App\Data\User\UserData;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\Api\V1\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function index(Request $request): AnonymousResourceCollection
    {
        $this->authorize('viewAny', User::class);

        return UserResource::collection(
            User::query()->with('roles')->paginate($request->integer('per_page', 15))
        );
    }

    public function store(StoreUserRequest $request, CreateUserAction $action): JsonResponse
    {
        $user = $action->handle(
            UserData::from($request->validated()),
            $request->file('avatar'),
        );

        return response()->json(['data' => new UserResource($user->load('roles'))], 201);
    }

    public function show(User $user): JsonResponse
    {
        $this->authorize('view', $user);

        return response()->json(['data' => new UserResource($user->load('roles'))]);
    }

    public function update(UpdateUserRequest $request, User $user, UpdateUserAction $action): JsonResponse
    {
        $user = $action->handle(
            $user,
            UserData::from($request->validated()),
            $request->file('avatar'),
        );

        return response()->json(['data' => new UserResource($user->load('roles'))]);
    }

    public function destroy(User $user, DeleteUserAction $action): JsonResponse
    {
        $this->authorize('delete', $user);

        $action->handle($user);

        return response()->json(null, 204);
    }
}
