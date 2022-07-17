<?php

namespace Application\Google;

use Domain\Repository\Google\GoogleRepositoryService;
use Domain\Users\UserDbService;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleService
{
    private GoogleRepositoryService $googleRepositoryService;
    private GoogleEntityService $googleEntityService;
    private UserDbService $userDbService;

    public function __construct(GoogleRepositoryService $googleRepositoryService,GoogleEntityService $googleEntityService, UserDbService $userDbService)
    {
        $this->googleRepositoryService = $googleRepositoryService;
        $this->googleEntityService =$googleEntityService;
        $this->userDbService = $userDbService;
    }

    public function getAuthLink(): RedirectResponse
    {
        return $this->googleRepositoryService->getAuthLink();
    }

    public function createGoogleUser()
    {
        $googleUserEntity = $this->googleRepositoryService->getAuthUser();

        $this->userDbService->createUser($this->googleEntityService->createUserEntity($googleUserEntity));
    }
}
