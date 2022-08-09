<?php

namespace Application\Twitch;

use Application\Twitch\Command\TokenCommand;
use Domain\ApiTokens\AccessTokenService;
use Domain\Repository\Twitch\TwitchSocialRepositoryService;
use Domain\Users\UserDbService;
use Symfony\Component\HttpFoundation\Cookie as CookieInstance;
use Illuminate\Support\Facades\Cookie;
class TwitchApplicationService
{
    private TwitchSocialRepositoryService $twitchSocialRepositoryService;
    private UserDbService $userDbService;
    private TwitchEntityService $twitchEntityService;
    private  AccessTokenService $accessTokenService;

    public function __construct(
        TwitchSocialRepositoryService $twitchSocialRepositoryService,
        UserDbService $userDbService,
        TwitchEntityService $twitchEntityService,
        AccessTokenService $accessTokenService
    ) {
        $this->twitchSocialRepositoryService = $twitchSocialRepositoryService;
        $this->userDbService = $userDbService;
        $this->twitchEntityService = $twitchEntityService;
        $this->accessTokenService = $accessTokenService;
    }

    public function makeAuthWithTwitch(): string
    {
       return $this->twitchSocialRepositoryService->createTwitchAuthorizationUrl();
    }

    public function loginByTwitch(TokenCommand $tokenCommand){
        $userTokenFromApi = $this->twitchSocialRepositoryService->getUserTokenFromTwitch($tokenCommand->getTwitchLoginCode());
        $userDataFromApi = $this->twitchSocialRepositoryService->getUserData($userTokenFromApi->getAccessToken());
        if($this->userDbService->hasUserAccount($userDataFromApi->getEmail())){

        }

        $user = $this->userDbService->createUser($this->twitchEntityService->createUserEntity($userDataFromApi));
        $this->accessTokenService->createTwitchToken($this->twitchEntityService->createTwitchTokenEntity($user->getId(), $userTokenFromApi));
        Cookie::queue(cookie('user_is_logged', 'MyValue', 30,null,null,false,true));
       // dd(Cookie::get('user_is_logged'));
        return ;
    }
}
