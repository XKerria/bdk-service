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

class User extends Authenticatable
{
    use HasFactory,
        HasApiTokens,
        Notifiable,
        Tokenable,
        Snowflakable,
        ResolveScope,
        PageScope;

    protected $hidden = ['password'];
    protected $guarded = [];

    protected static function booted()
    {
        static::creating(function ($user) {
            if (is_null($user->password)) {
                $user->password = '123456';
            }
        });
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

    public function firm() {
        return $this->belongsTo(Firm::class);
    }
}
