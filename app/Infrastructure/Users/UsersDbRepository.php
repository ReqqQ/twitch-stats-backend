<?php

namespace Infrastructure\Users;

use Domain\Users\Entity\UsersModel;
use Domain\Users\IUsersDbRepository;
use Illuminate\Database\Eloquent\Model;

class UsersDbRepository implements IUsersDbRepository
{
    public function getUser(string $codeTwitchUser): Model|null
    {
        return UsersModel::query()->whereJsonContains(UsersModel::CUSTOM_PARAMS, ['code' => $codeTwitchUser])->first();
    }
}
