<?php

namespace Domain\Users\Entity;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Model;

class UsersEntity extends Model
{
    public const CUSTOM_PARAMS = 'custom_params';
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'google_id',
        'email',
        'avatar',
        'display_name',
        'custom_params',
        'is_active'
    ];

    protected $casts = [
        'custom_params' => AsCollection::class,
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getGoogleId(): string
    {
        return $this->attributes['google_id'];
    }

    public function setGoogleId(string $userGoogleId): UsersEntity
    {
        $this->attributes['google_id'] = $userGoogleId;

        return $this;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): UsersEntity
    {
        $this->attributes['email'] = $email;

        return $this;
    }

    public function getAvatar(): string
    {
        return $this->attributes['avatar'];
    }

    public function setAvatar(string $avatarUrl): UsersEntity
    {
        $this->attributes['avatar'] = $avatarUrl;

        return $this;
    }

    public function getDisplayName(): string
    {
        return $this->attributes['display_name'];
    }

    public function setDisplayName(string $display_name): UsersEntity
    {
        $this->attributes['display_name'] = $display_name;

        return $this;
    }

    public function getCustomParams(): string
    {
        return $this->attributes['custom_params'];
    }

    public function setCustomParams(UsersCustomParamsEntity $customParamsEntity): UsersEntity
    {
        $this->attributes['custom_params'] = $customParamsEntity->toJson();

        return $this;
    }
}
