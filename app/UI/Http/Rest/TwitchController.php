<?php

namespace App\UI\Http\Rest;

use Application\Twitch\TwitchApplicationService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class TwitchController extends BaseController
{
    private TwitchApplicationService $twitchApplicationService;

    public function __construct(TwitchApplicationService $twitchApplicationService)
    {
        $this->twitchApplicationService = $twitchApplicationService;
    }

    public function auth()
    {
        return $this->twitchApplicationService->makeAuthWithTwitch();
    }
}
