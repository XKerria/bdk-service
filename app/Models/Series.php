<?php

namespace App\Models;

use App\Models\Abilities\Snowflakable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Series extends Model
{
    use HasFactory,
        Snowflakable;

    protected $guarded = [];

    public function getImageAttribute($value) {
        if (Str::startsWith($value, 'http')) return $value;

        $endpoint = env('OSS_ENDPOINT');
        return "https://{$endpoint}/{$value}";
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function vehicles() {
        return $this->hasMany(Vehicle::class);
    }
}
