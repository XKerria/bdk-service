<?php

namespace App\Models;

use App\Models\Abilities\Snowflakable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    use HasFactory,
        Snowflakable;

    protected $guarded = [];

    protected $casts = [
        'brands' => 'json'
    ];
}
