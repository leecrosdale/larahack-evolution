<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuildingRequirement extends Model
{
    public function building() {
        return $this->belongsTo(Building::class);
    }

    public function supply() {
        return $this->belongsTo(Supply::class);
    }
}
