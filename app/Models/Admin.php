<?php

namespace App\Models;

use App\Models\Abilities\Snowflakable;
use App\Models\Abilities\Tokenable;
use App\Models\Scopes\PageScope;
use App\Models\Scopes\ResolveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasFactory,
        Notifiable,
        HasApiTokens,
        Tokenable,
        Snowflakable,
        ResolveScope,
        PageScope;

    protected $hidden = [];
    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function ($admin) {
            if (is_null($admin->password)) {
                $admin->password = '123456';
            }
        });
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }
}
