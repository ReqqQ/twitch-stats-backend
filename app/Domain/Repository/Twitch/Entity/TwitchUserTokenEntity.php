<?php

namespace Domain\Repository\Twitch\Entity;

class TwitchUserTokenEntity
{
    private string $accessToken;
    private string $refreshToken;
    private int $expireTime;

    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    public function setAccessToken($accessToken): static
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }

    public function setRefreshToken($refreshToken): static
    {
        $this->refreshToken = $refreshToken;

        return $this;
    }

    public function getExpireTime(): int
    {
        return $this->expireTime;
    }

    public function setExpireTime($expireTime): static
    {
        $this->expireTime = $expireTime;

        return $this;
    }

}
