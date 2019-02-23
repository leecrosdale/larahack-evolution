<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSupply extends Model
{
    public $timestamps = false;


    public function supply() {
        return $this->belongsTo(Supply::class);
    }

}
