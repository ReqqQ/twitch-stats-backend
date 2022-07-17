<?php

namespace Application\Google;

use Domain\Repository\Google\GoogleRepositoryService;
use Domain\Users\UserDbService;
use Domain\UsersToken\UsersTokenService;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleService
{
    private GoogleRepositoryService $googleRepositoryService;
    private GoogleEntityService $googleEntityService;
    private UserDbService $userDbService;
    private UsersTokenService $usersTokenService;

    public function __construct(GoogleRepositoryService $googleRepositoryService,GoogleEntityService $googleEntityService, UserDbService $userDbService,UsersTokenService $usersTokenService)
    {
        $this->googleRepositoryService = $googleRepositoryService;
        $this->googleEntityService =$googleEntityService;
        $this->userDbService = $userDbService;
        $this->usersTokenService = $usersTokenService;
    }

    public function getAuthLink(): RedirectResponse
    {
        return $this->googleRepositoryService->getAuthLink();
    }

    public function createGoogleUser()
    {
        $googleUserEntity = $this->googleRepositoryService->getAuthUser();
        $userEntity = $this->userDbService->getUser($googleUserEntity->getEmail());
        if(!$userEntity){
            $userEntity = $this->userDbService->createUser($this->googleEntityService->createUserEntity($googleUserEntity));
            $userTokenEntity = $this->usersTokenService->createTokenForUser($userEntity->getId());
        } else{
            $userTokenEntity = $this->usersTokenService->updateTokenForUser($userEntity->getId());
        }
       $this->usersTokenService->setTokenCookie($userTokenEntity->getToken());
    }
}
