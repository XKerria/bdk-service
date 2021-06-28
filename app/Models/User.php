<?php

namespace App\Models;

use App\Models\Abilities\Snowflakable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory,
        Snowflakable,
        Notifiable;

    protected $guarded = [];
}
