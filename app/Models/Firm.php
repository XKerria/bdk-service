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

    protected $appends = ['amount', 'remain'];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function vehicles() {
        return $this->hasMany(Vehicle::class);
    }

    public function getAmountAttribute(): int {
        return $this->vehicles()->sum('amount');
    }

    public function getRemainAttribute(): int {
        return $this->vehicles()->sum('remain');
    }
}
