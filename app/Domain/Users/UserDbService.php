<?php

namespace Domain\Users;

use Domain\Users\Entity\UsersEntity;
use Illuminate\Database\Eloquent\Model;

class UserDbService
{
    private IUsersDbRepository $usersDbRepository;

    public function __construct(IUsersDbRepository $usersDbRepository)
    {
        $this->usersDbRepository = $usersDbRepository;
    }

    public function getUser(string $userEmail): ?UsersEntity
    {
        return $this->usersDbRepository->getUser($userEmail);
    }

    public function createUser(UsersEntity $usersEntity): UsersEntity
    {
        return $this->usersDbRepository->saveUser($usersEntity);
    }
}
