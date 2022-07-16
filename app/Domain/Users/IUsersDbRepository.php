<?php

namespace Domain\Users;

use Domain\Users\Entity\UsersEntity;
use Domain\Users\Entity\UsersModel;
use Illuminate\Database\Eloquent\Model;

interface IUsersDbRepository
{
    public function getUser(string $userEmail): Model|null;

    public function saveUser(UsersEntity $usersEntity): UsersEntity|null;
}
