<?php

namespace App\Models;

use App\Models\Abilities\Snowflakable;
use App\Models\Scopes\PageScope;
use App\Models\Scopes\ResolveScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Brand extends Model
{
    use HasFactory,
        Snowflakable,
        ResolveScope,
        PageScope;

    protected $guarded = [];

    public function series() {
        return $this->hasMany(Series::class);
    }
}
