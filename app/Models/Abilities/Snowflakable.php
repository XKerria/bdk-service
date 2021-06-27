<?php


namespace App\Models\Abilities;


use Kra8\Snowflake\HasSnowflakePrimary;

trait Snowflakable {
    use HasSnowflakePrimary;

    public function getKeyType() {
        return 'string';
    }

    public function getKeyName() {
        return 'id';
    }

    public function getIncrementing() {
        return false;
    }
}
