<?php

namespace Domain\Repository\Google;

use Domain\Repository\Google\Entity\GoogleUserCustomParamsEntity;
use Domain\Repository\Google\Entity\GoogleUserEntity;
use Infrastructure\Repository\Google\GoogleRepository;
use Laravel\Socialite\Contracts\User;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleRepositoryService
{
    private GoogleRepository $googleRepository;
    public function __construct(GoogleRepository $googleRepository)
    {
        $this->googleRepository = $googleRepository;
    }

    public function getAuthLink(): RedirectResponse
    {
        return $this->googleRepository->getAuthLink();
    }

    public function getAuthUser(): GoogleUserEntity
    {
        return $this->getGoogleUserEntity($this->googleRepository->getAuthUser());
    }

    private function getGoogleUserEntity(User $googleUser): GoogleUserEntity
    {
        return (new GoogleUserEntity())
            ->setGoogleId($googleUser->getId())
            ->setEmail($googleUser->getEmail())
            ->setAvatar($googleUser->getAvatar())
            ->setUserName($googleUser->getName())
            ->setEmailVerified($googleUser->user['email_verified'])
            ->setGoogleToken($googleUser->token)
            ->setLocale($googleUser->user['locale']);
    }
}
