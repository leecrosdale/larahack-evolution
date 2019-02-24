<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSupply extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'supply_id',
        'amount'
    ];


    public function supply() {
        return $this->belongsTo(Supply::class);
    }

}
