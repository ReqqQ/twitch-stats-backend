<?php

namespace Domain\ApiTokens\Entity;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Model;

class TokenEntity extends Model
{
    private string $token;
    private string $refreshToken;
    private string $expireTime;

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->attributes['token'];
    }

    /**
     * @param  string  $token
     * @return TokenEntity
     */
    public function setToken(string $token): TokenEntity
    {
        $this->attributes['token'] = $token;

        return $this;
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->attributes['refreshToken'];
    }

    /**
     * @param  string  $refreshToken
     * @return TokenEntity
     */
    public function setRefreshToken(string $refreshToken): TokenEntity
    {
        $this->attributes['refreshToken'] = $refreshToken;

        return $this;
    }

    /**
     * @return string
     */
    public function getExpireTime(): string
    {
        return $this->attributes['expireTime'];
    }

    /**
     * @param  string  $expireTime
     * @return TokenEntity
     */
    public function setExpireTime(string $expireTime): TokenEntity
    {
        $this->attributes['expireTime'] = $expireTime;

        return $this;
    }
}
