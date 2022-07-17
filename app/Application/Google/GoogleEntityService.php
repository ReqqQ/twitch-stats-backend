<?php

namespace Application\Google;

use Domain\Repository\Google\Entity\GoogleUserEntity;
use Domain\Users\Entity\UsersCustomParamsEntity;
use Domain\Users\Entity\UsersEntity;

class GoogleEntityService
{
    public function createUserEntity(GoogleUserEntity $googleUserEntity): UsersEntity
    {
        return (new UsersEntity())
            ->setGoogleId($googleUserEntity->getGoogleId())
            ->setEmail($googleUserEntity->getEmail())
            ->setAvatar($googleUserEntity->getAvatar())
            ->setDisplayName($googleUserEntity->getUserName())
            ->setCustomParams($this->getUsersCustomParamsEntity($googleUserEntity));
    }

    private function getUsersCustomParamsEntity(GoogleUserEntity $googleUserEntity): UsersCustomParamsEntity
    {
        return (new UsersCustomParamsEntity())
            ->setGoogleToken($googleUserEntity->getGoogleToken())
            ->setIsEmailVerified($googleUserEntity->isEmailVerified())
            ->setUserLocale($googleUserEntity->getLocale());
    }
}
