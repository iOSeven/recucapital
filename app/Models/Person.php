<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'company_id',
        'external_id',
        'name',
        'email',
        'phone',
        'position',
        'raw_data',
    ];

    protected $casts = [
        'raw_data' => 'array',
    ];
}
