<?php

namespace Application\Twitch;

use Application\Twitch\Command\TokenCommand;
use Domain\SocialPlatforms\Twitch\TwitchSocialRepositoryService;
class TwitchApplicationService
{
    private TwitchSocialRepositoryService $twitchSocialRepositoryService;
    public function __construct(TwitchSocialRepositoryService $twitchSocialRepositoryService)
    {
        $this->twitchSocialRepositoryService= $twitchSocialRepositoryService;
    }

    public function makeAuthWithTwitch(): string
    {
       return $this->twitchSocialRepositoryService->createTwitchAuthorizationUrl();
    }

    public function loginByTwitch(TokenCommand $tokenCommand){
        $response = $this->twitchSocialRepositoryService->getUserTokenFromTwitch($tokenCommand->getAccessToken());

        dd($response);
    }
}
