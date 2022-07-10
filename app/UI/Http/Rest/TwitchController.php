<?php

namespace App\UI\Http\Rest;

use Application\Twitch\Command\TokenCommand;
use Application\Twitch\TwitchApplicationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;

class TwitchController extends BaseController
{
    private TwitchApplicationService $twitchApplicationService;

    public function __construct(TwitchApplicationService $twitchApplicationService)
    {
        $this->twitchApplicationService = $twitchApplicationService;
    }

    public function getAuthLink(): RedirectResponse
    {
       return Redirect::to($this->twitchApplicationService->makeAuthWithTwitch());
    }

    public function loginByTwitch(): RedirectResponse
    {
        $tokenCommand = (new TokenCommand())->setAccessToken(request()->code);
        $this->twitchApplicationService->loginByTwitch($tokenCommand);

        return Redirect::to('/');
    }
}
