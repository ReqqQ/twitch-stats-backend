<?php

namespace Domain\Users;

use Domain\Users\Entity\UsersEntity;

class UserDbService
{
    private IUsersDbRepository $usersDbRepository;

    public function __construct(IUsersDbRepository $usersDbRepository)
    {
        $this->usersDbRepository = $usersDbRepository;
    }

    public function hasUserAccount(string $userEmail): bool
    {
        return $this->usersDbRepository->getUser($userEmail)->exists;
    }

    public function createUser(UsersEntity $usersEntity): UsersEntity
    {
        return $this->usersDbRepository->saveUser($usersEntity);
    }
}
