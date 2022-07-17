<?php

namespace Domain\UsersToken;

use Domain\UsersToken\Entity\UsersTokenEntity;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Infrastructure\UsersToken\UsersTokenDbRepository;

class UsersTokenService
{
    private const ONE_DAY_IN_SECODNS = 86400;
    private const ONE_DAY_IN_MINUTES = 1440;
    public const USER_TOKEN = 'userToken';
    private UsersTokenDbRepository $usersTokenDbRepository;

    public function __construct(UsersTokenDbRepository $usersTokenDbRepository)
    {
        $this->usersTokenDbRepository = $usersTokenDbRepository;
    }

    public function getUserByToken(string $cookieToken): ?UsersTokenEntity
    {
        return $this->usersTokenDbRepository->getUserByToken($cookieToken);
    }

    public function setTokenCookie(string $userToken): void
    {
        Cookie::queue(cookie(self::USER_TOKEN, $userToken, self::ONE_DAY_IN_MINUTES, null, null, false, true));
    }

    public function createTokenForUser(int $userId): UsersTokenEntity
    {
        return $this->usersTokenDbRepository->saveUserToken(
            $this->getUsersTokenEntity($userId, $this->generateRandomToken($userId))
        );
    }

    public function updateTokenForUser(int $userId): UsersTokenEntity
    {
        $userTokenEntity = $this->getUsersTokenEntity($userId, $this->generateRandomToken($userId));

        return $this->usersTokenDbRepository->updateUserToken($this->prepareEntityToUpdate($userTokenEntity));
    }

    private function prepareEntityToUpdate(UsersTokenEntity $userTokenEntity): UsersTokenEntity
    {
        $userTokenFromDB = $this->usersTokenDbRepository->getUserToken($userTokenEntity->getUserId());

        return $userTokenFromDB->setToken($userTokenEntity->getToken())->setExpireAt($userTokenEntity->getExpireAt());
    }

    private function getUsersTokenEntity(int $userId, string $randomToken): UsersTokenEntity
    {
        return (new UsersTokenEntity())->setUserId($userId)->setToken($randomToken)->setExpireAt($this->getExpireAt());
    }

    private function getExpireAt(): int
    {
        return time() + self::ONE_DAY_IN_SECODNS;
    }

    private function generateRandomToken(int $userId): string
    {
        do {
            $token = hash('xxh3', Str::random('150'));
        } while ($this->usersTokenDbRepository->userHasToken($userId, $token));

        return $token;
    }
}
