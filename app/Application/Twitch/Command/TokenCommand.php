<?php

namespace Application\Twitch\Command;

class TokenCommand
{
    private string $twitchLoginCode;

    public function getTwitchLoginCode()
    {
        return $this->twitchLoginCode;
    }

    public function setAccessToken($twitchLoginCode): static
    {
        $this->twitchLoginCode = $twitchLoginCode;

        return $this;
    }
}
