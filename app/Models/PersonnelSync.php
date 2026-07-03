<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonnelSync extends Model
{
    protected $fillable = [
        'company_id',
        'status',
        'total_records',
        'started_at',
        'finished_at',
        'error_message',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
    ];
}
