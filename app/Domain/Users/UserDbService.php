<?php

namespace Domain\Users;

class UserDbService
{
    private IUsersDbRepository $usersDbRepository;

    public function __construct(IUsersDbRepository $usersDbRepository)
    {
        $this->usersDbRepository = $usersDbRepository;
    }

    public function hasUserAccount(string $userTwitchCode): bool
    {
        return $this->usersDbRepository->getUser($userTwitchCode)->exists;
    }
}
