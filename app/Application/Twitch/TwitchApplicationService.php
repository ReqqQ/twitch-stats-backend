<?php

namespace Application\Twitch;

use Application\Twitch\Command\TokenCommand;
use Domain\SocialPlatforms\Twitch\TwitchSocialRepositoryService;
use Domain\Users\UserDbService;
use Symfony\Component\HttpFoundation\Cookie as CookieInstance;
use Illuminate\Support\Facades\Cookie;
class TwitchApplicationService
{
    private TwitchSocialRepositoryService $twitchSocialRepositoryService;
    private UserDbService $userDbService;
    public function __construct(TwitchSocialRepositoryService $twitchSocialRepositoryService,UserDbService $userDbService)
    {
        $this->twitchSocialRepositoryService= $twitchSocialRepositoryService;
        $this->userDbService = $userDbService;
    }

    public function makeAuthWithTwitch(): string
    {
       return $this->twitchSocialRepositoryService->createTwitchAuthorizationUrl();
    }

    public function loginByTwitch(TokenCommand $tokenCommand){
//        if($this->userDbService->hasUserAccount($tokenCommand->getAccessToken())){
//
//        }

        Cookie::queue(cookie('aloalo', 'MyValue', 30));

        return $this->twitchSocialRepositoryService->getUserTokenFromTwitch($tokenCommand->getAccessToken());
    }
}
