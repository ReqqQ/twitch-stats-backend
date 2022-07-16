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
        'email',
        'login',
        'display_name',
        'is_active'
    ];

    protected $casts = [
        'custom_params' => AsCollection::class,
    ];

    public function getId()
    {
        return $this->attributes['id'];
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    /**
     * @param  string  $email
     * @return UsersEntity
     */
    public function setEmail(string $email): UsersEntity
    {
        $this->attributes['email'] = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->attributes['login'];
    }

    /**
     * @param  string  $login
     * @return UsersEntity
     */
    public function setLogin(string $login): UsersEntity
    {
        $this->attributes['login'] = $login;

        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->attributes['display_name'];
    }

    /**
     * @param  string  $display_name
     * @return UsersEntity
     */
    public function setDisplayName(string $display_name): UsersEntity
    {
        $this->attributes['display_name'] = $display_name;

        return $this;
    }
}
