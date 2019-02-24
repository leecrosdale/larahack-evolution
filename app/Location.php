<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function users() {
        return $this->hasMany(User::class);
    }

    public function alive_users() {
        return $this->hasMany(User::class)->where('health', '>', 0);
    }
}
