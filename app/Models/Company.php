<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'api_user',
        'api_password',
        'office_id',
        'auth_url',
        'personnel_url',
        'token',
        'token_expires_at',
        'active',
    ];

    protected $casts = [
        'token_expires_at' => 'datetime',
        'active' => 'boolean',
    ];
}
