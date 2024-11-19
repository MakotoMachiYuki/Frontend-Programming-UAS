<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as Authenticatable;


class Account extends Authenticatable
{

    protected $collection = 'user_accounts';
    protected $primaryKey = '_id';
    protected $fillable =
        [
            'firstName',
            'lastName',
            'email',
            'password'
        ];

    protected $hidden =
        [
            'password',
            'remember_token',
        ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
