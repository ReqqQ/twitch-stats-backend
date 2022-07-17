<?php

namespace Domain\Users;

use Domain\Users\Entity\UsersEntity;
use Illuminate\Database\Eloquent\Model;

interface IUsersDbRepository
{
    public function getUser(string $userEmail): UsersEntity|Model|null;

    public function saveUser(UsersEntity $usersEntity): UsersEntity|null;
}
