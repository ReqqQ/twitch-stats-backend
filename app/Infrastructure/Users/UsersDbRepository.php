<?php

namespace Infrastructure\Users;

use Domain\Users\Entity\UsersEntity;
use Domain\Users\IUsersDbRepository;
use Illuminate\Database\Eloquent\Model;

class UsersDbRepository implements IUsersDbRepository
{
    public function getUser(string $userEmail): UsersEntity|Model|null
    {
        return UsersEntity::query()->where('email', $userEmail)->first();
    }

    public function saveUser(UsersEntity $usersEntity): UsersEntity|null
    {
        $isCreated = $usersEntity->save();
        return $isCreated ? $usersEntity : null;
    }
}
