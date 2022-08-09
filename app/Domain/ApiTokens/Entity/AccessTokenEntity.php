<?php

namespace Domain\ApiTokens\Entity;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Model;

class AccessTokenEntity extends Model
{
    protected $table = 'social_access_token';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'social_type',
        'token',
    ];

    protected $casts = [
        'token' => AsCollection::class,
    ];

    public function __construct(array $attributes = [])
    {
        $this->attributes['token'] = new TokenEntity();
        parent::__construct($attributes);
    }

    public function getToken(): string
    {
        return $this->attributes['token'];
    }

    public function setToken(string $tokenEntity): AccessTokenEntity
    {
        $this->attributes['token'] = $tokenEntity;

        return $this;
    }

    public function getUserId(): string
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): AccessTokenEntity
    {
        $this->attributes['user_id'] = $userId;

        return $this;
    }

    public function getSocialType(): string
    {
        return $this->attributes['social_type'];
    }

    public function setSocialType(string $social_type): AccessTokenEntity
    {
        $this->attributes['social_type'] = $social_type;

        return $this;
    }
}
