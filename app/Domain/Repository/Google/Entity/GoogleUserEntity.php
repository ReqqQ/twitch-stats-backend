<?php

namespace Domain\Repository\Google\Entity;

class GoogleUserEntity
{
    private string $googleId;
    private string $userName;
    private string $email;
    private string $avatar;
    private string $googleToken;
    private bool $emailVerified;
    private string $locale;

    /**
     * @return string
     */
    public function getGoogleToken(): string
    {
        return $this->googleToken;
    }

    /**
     * @param  string  $googleToken
     * @return GoogleUserEntity
     */
    public function setGoogleToken(string $googleToken): GoogleUserEntity
    {
        $this->googleToken = $googleToken;

        return $this;
    }

    /**
     * @return bool
     */
    public function isEmailVerified(): bool
    {
        return $this->emailVerified;
    }

    /**
     * @param  bool  $emailVerified
     * @return GoogleUserEntity
     */
    public function setEmailVerified(bool $emailVerified): GoogleUserEntity
    {
        $this->emailVerified = $emailVerified;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param  string  $locale
     * @return GoogleUserEntity
     */
    public function setLocale(string $locale): GoogleUserEntity
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return string
     */
    public function getGoogleId(): string
    {
        return $this->googleId;
    }

    /**
     * @param  string  $googleId
     * @return GoogleUserEntity
     */
    public function setGoogleId(string $googleId): GoogleUserEntity
    {
        $this->googleId = $googleId;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @param  string  $userName
     * @return GoogleUserEntity
     */
    public function setUserName(string $userName): GoogleUserEntity
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param  string  $email
     * @return GoogleUserEntity
     */
    public function setEmail(string $email): GoogleUserEntity
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @param  string  $avatar
     * @return GoogleUserEntity
     */
    public function setAvatar(string $avatar): GoogleUserEntity
    {
        $this->avatar = $avatar;

        return $this;
    }
}
