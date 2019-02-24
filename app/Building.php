<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function requirements() {
        return $this->hasMany(BuildingRequirement::class);
    }

    public function requirements_arr() {

        $supplies = [];

        foreach ($this->requirements as $requirement) {
            $cost = $requirement->amount * (Auth::user()->user_buildings()->count() + 1) * Auth::user()->level;
            $supplies[$requirement->supply->slug] = $cost;
        }

        return $supplies;
    }

}
