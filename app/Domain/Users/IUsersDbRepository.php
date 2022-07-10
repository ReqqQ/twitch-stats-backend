<?php

namespace Domain\Users;

use Domain\Users\Entity\UsersModel;
use Illuminate\Database\Eloquent\Model;

interface IUsersDbRepository
{
    public function getUser(string $codeTwitchUser): Model|null;
}
