<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'type',
        'age_id'
    ];


    public function age() {
        return $this->belongsTo(Age::class);
    }

}
