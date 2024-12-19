<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;

class Admin extends User
{
    protected $fillable = [
        'email',
        'name',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
