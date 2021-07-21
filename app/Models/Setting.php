<?php

namespace App\Models;

use App\Models\Abilities\Snowflakable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory, Snowflakable;

    protected $guarded = [];

    public function getRouteKeyName(): string {
        return 'name';
    }
}
