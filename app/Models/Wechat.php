<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wechat extends Model
{
    use HasFactory;

    protected $primaryKey = 'openid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $guarded = [];

    public function getRouteKeyName() {
        return 'openid';
    }
}
