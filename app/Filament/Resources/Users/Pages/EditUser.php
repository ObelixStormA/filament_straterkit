<?php

declare(strict_types=1);

namespace App\Filament\Resources\Users\Pages;

use App\Actions\User\UpdateUserAction;
use App\Data\User\UserData;
use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        /** @var User $record */
        $record = $this->getRecord();

        $data['roles'] = $record->roles->pluck('name')->all();

        return $data;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $avatar = Arr::pull($data, 'avatar');

        $userData = UserData::from([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'] ?? null,
            'roles' => $data['roles'] ?? [],
        ]);

        /** @var User $record */
        return app(UpdateUserAction::class)->handle($record, $userData, $avatar);
    }
}
