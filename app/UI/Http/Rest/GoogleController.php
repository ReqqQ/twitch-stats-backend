<?php

namespace App\UI\Http\Rest;

use Application\Google\GoogleService;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class GoogleController
{
    private GoogleService $googleService;

    public function __construct(GoogleService $googleService)
    {
        $this->googleService = $googleService;
    }

    public function getAuthLink()
    {
        return $this->googleService->getAuthLink();
    }

    public function userFromGoogle(){
        $this->googleService->createGoogleUser();
        return view('pages.home');
    }
}
