<?php

namespace Domain\ApiTokens;

use Domain\ApiTokens\Entity\AccessTokenEntity;
use Infrastructure\AccessTokens\AccessTokenDbRepository;

class AccessTokenService
{
    public const SOCIAL_TYPE_TWITCH = 1;
    private AccessTokenDbRepository $accessTokenDbRepository;

    public function __construct(AccessTokenDbRepository $accessTokenDbRepository)
    {
        $this->accessTokenDbRepository = $accessTokenDbRepository;
    }

    public function createTwitchToken(AccessTokenEntity $accessTokenEntity): AccessTokenEntity
    {
       return $this->accessTokenDbRepository->saveToken($accessTokenEntity);
    }
}
