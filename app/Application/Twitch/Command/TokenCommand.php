<?php

namespace Application\Twitch\Command;

class TokenCommand
{
    private string $accessToken;

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function setAccessToken($accessToken): static
    {
        $this->accessToken = $accessToken;

        return $this;
    }
}
