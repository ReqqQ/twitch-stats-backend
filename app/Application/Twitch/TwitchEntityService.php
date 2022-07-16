<?php

namespace Application\Twitch;

use Domain\ApiTokens\AccessTokenService;
use Domain\ApiTokens\Entity\AccessTokenEntity;
use Domain\ApiTokens\Entity\TokenEntity;
use Domain\SocialPlatforms\Twitch\Entity\TwitchUserDataEntity;
use Domain\SocialPlatforms\Twitch\Entity\TwitchUserTokenEntity;
use Domain\Users\Entity\UsersEntity;

class TwitchEntityService
{
    public function createUserEntity(TwitchUserDataEntity $twitchUserTokenEntity): UsersEntity
    {
        return (new UsersEntity())
            ->setEmail($twitchUserTokenEntity->getEmail())
            ->setLogin($twitchUserTokenEntity->getLogin())
            ->setDisplayName($twitchUserTokenEntity->getDisplayName());
    }

    public function createTwitchTokenEntity(int $userId, TwitchUserTokenEntity $twitchUserTokenEntity): AccessTokenEntity
    {
        $accessTokenEntity = new AccessTokenEntity();
        $accessTokenEntity
            ->setSocialType(AccessTokenService::SOCIAL_TYPE_TWITCH)
            ->setUserId($userId)
            ->setToken($this->createTokenEntity($twitchUserTokenEntity)->toJson());


        return $accessTokenEntity;
    }

    private function createTokenEntity(TwitchUserTokenEntity $twitchUserTokenEntity): TokenEntity
    {
        return (new TokenEntity())
            ->setToken($twitchUserTokenEntity->getAccessToken())
            ->setRefreshToken($twitchUserTokenEntity->getRefreshToken())
            ->setExpireTime($twitchUserTokenEntity->getExpireTime());
    }
}
