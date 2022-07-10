<?php

namespace Domain\Users\Entity;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    public const CUSTOM_PARAMS = 'custom_params';
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'email',
        'login',
        'display_name',
        'custom_params',
        'social_type',
        'is_active'
    ];

    protected $casts = [
        'custom_params' => AsCollection::class,
    ];
}
