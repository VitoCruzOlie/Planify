<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class EventUser extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $table = 'event_user';

    protected $fillable = [
        'event_id',
        'user_id',
        'confirmed'
    ];
}
