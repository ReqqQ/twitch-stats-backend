<?php

namespace Domain\Users\Entity;

use Illuminate\Database\Eloquent\Model;

class UsersCustomParamsEntity extends Model
{
    public function setGoogleToken(string $googleToken): static
    {
        $this->attributes['googleToken'] = $googleToken;

        return $this;
    }
    public function setIsEmailVerified(bool $isEmailVerified): static
    {
        $this->attributes['emailVerified'] = $isEmailVerified;

        return $this;
    }

    public function setUserLocale(string $userLocale): static
    {
        $this->attributes['locale'] = $userLocale;

        return $this;
    }

}
