<?php

namespace App\Models;

use App\Models\Abilities\Snowflakable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory,
        Snowflakable;

    protected $guarded = [];

    public function getImageAttribute($value) {
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
