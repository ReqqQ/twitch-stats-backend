<?php

namespace Domain\SocialPlatforms\Twitch\Entity;

class TwitchUserDataEntity
{
    private string $id;
    private string $login;
    private string $displayName;
    private string $broadcasterType;
    private string $description;
    private string $profileImageUrl;
    private string $viewCount;
    private string $email;
    private string $createdAt;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login): static
    {
        $this->login = $login;

        return $this;
    }

    public function getDisplayName()
    {
        return $this->displayName;
    }

    public function setDisplayName($displayName): static
    {
        $this->displayName = $displayName;

        return $this;
    }

    public function getBroadcasterType()
    {
        return $this->broadcasterType;
    }

    public function setBroadcasterType($broadcasterType): static
    {
        $this->broadcasterType = $broadcasterType;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getProfileImageUrl()
    {
        return $this->profileImageUrl;
    }

    public function setProfileImageUrl($profileImageUrl): static
    {
        $this->profileImageUrl = $profileImageUrl;

        return $this;
    }

    public function getViewCount()
    {
        return $this->viewCount;
    }

    public function setViewCount($viewCount): static
    {
        $this->viewCount = $viewCount;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
