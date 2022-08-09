<?php

namespace Infrastructure\AccessTokens;

use Domain\ApiTokens\Entity\AccessTokenEntity;

class AccessTokenDbRepository
{
    public function saveToken(AccessTokenEntity $accessTokenEntity): AccessTokenEntity
    {
        $accessTokenEntity->save();

        return $accessTokenEntity;
    }
}
