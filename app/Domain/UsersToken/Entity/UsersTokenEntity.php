<?php

namespace Domain\UsersToken\Entity;

use Illuminate\Database\Eloquent\Model;

class UsersTokenEntity extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'user_id';
    protected $table = 'users_token';
    protected $fillable = [
        'user_id',
        'token',
        'expire_at',
    ];

    public function setUserId(int $userId): static
    {
        $this->attributes['user_id'] = $userId;

        return $this;
    }

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setToken(string $token): static
    {
        $this->attributes['token'] = $token;

        return $this;
    }

    public function getToken():string
    {
        return $this->attributes['token'];
    }

    public function setExpireAt(int $expireAt): static
    {
        $this->attributes['expire_at'] = $expireAt;

        return $this;
    }

    public function getExpireAt()
    {
        return $this->attributes['expire_at'];
    }
}
