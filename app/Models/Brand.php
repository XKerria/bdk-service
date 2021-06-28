<?php

namespace App\Models;

use App\Models\Abilities\Snowflakable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory,
        Snowflakable;

    protected $guarded = [];

    public function getLogoAttribute($value) {
        $endpoint = env('OSS_BUCKET_ENDPOINT');
        return "https://{$endpoint}/{$value}";
    }

    public function series() {
        return $this->hasMany(Series::class);
    }
}
