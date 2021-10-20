<?php


namespace App\Models\Scopes;

trait TreeScope {
    public function scopeRoots($query, $field_name = 'pid') {
        return $query->whereNull($field_name);
    }
}
