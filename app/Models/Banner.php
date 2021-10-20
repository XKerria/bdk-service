<?php

namespace App\Models;

use App\Models\Abilities\Snowflakable;
use App\Models\Scopes\PageScope;
use App\Models\Scopes\ResolveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory,
        Snowflakable,
        ResolveScope,
        PageScope;

    protected $guarded = [];
}
