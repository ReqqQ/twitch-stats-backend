<?php

namespace Infrastructure\UsersToken;

use Domain\UsersToken\Entity\UsersTokenEntity;
use Illuminate\Database\Eloquent\Model;

class UsersTokenDbRepository
{
    public function userHasToken(int $userId, string $userToken): bool
    {
        return UsersTokenEntity::query()->where('user_id', $userId)->where('token', $userToken)->exists();
    }

    public function getUserToken(int $userId): UsersTokenEntity|Model|null
    {
        return UsersTokenEntity::query()->where('user_id', $userId)->first();
    }

    public function getUserByToken(string $cookieToken): UsersTokenEntity|Model|null
    {
        return UsersTokenEntity::query()->where('token', $cookieToken)->first();
    }

    public function updateUserToken(UsersTokenEntity $usersTokenEntity)
    {
        $usersTokenEntity->update();

        return $usersTokenEntity;
    }

    public function saveUserToken(UsersTokenEntity $usersTokenEntity): UsersTokenEntity
    {
        $usersTokenEntity->save();

        return $usersTokenEntity;
    }
}
