<?php

namespace App\Models;

use App\Casts\RealArray;
use App\Models\Abilities\Snowflakable;
use App\Models\Scopes\PageScope;
use App\Models\Scopes\ResolveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Black extends Model
{
    use HasFactory,
        Snowflakable,
        ResolveScope,
        PageScope;

    protected $guarded = [];
    protected $casts = [
        'images' => RealArray::class
    ];
}
