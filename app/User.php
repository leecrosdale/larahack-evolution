<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $dates = [

        'created_at',
        'updated_at',
        'last_login'


    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar_name', 'location_id', 'age_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *a
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function age() {
        return $this->belongsTo(Age::class);
    }

    public function user_buildings() {
        return $this->hasMany(UserBuilding::class);
    }

    public function buildings() {
        return $this->belongsToMany(Building::class,'user_buildings')->withPivot(['level','health','max_health','next_work']);
    }

    public function clan() {
        return $this->belongsTo(Clan::class);
    }

    public function user_supplies() {
        return $this->hasMany(UserSupply::class);
    }

    public function supplies() {
        return $this->belongsToMany(Supply::class, 'user_supplies');
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }


}
