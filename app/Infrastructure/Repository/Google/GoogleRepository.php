<?php

namespace Infrastructure\Repository\Google;

use Laravel\Socialite\Contracts\User;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class GoogleRepository
{
    public function getAuthLink(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function getAuthUser(): User
    {
        return Socialite::driver('google')->user();
    }
}
