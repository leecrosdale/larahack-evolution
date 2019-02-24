<?php

namespace App;

use App\Repository\Work;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserBuilding extends Model
{

    public $dates = [
        'next_work'
    ];

    protected $appends = ['next_work_time', 'next_work_supply', 'building_type', 'can_be_upgraded'];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function getNextWorkTimeAttribute()
    {
        $difference = Carbon::now()->diffInSeconds($this->next_work, false);
        return Carbon::now()->addSeconds($difference)->diffForHumans();
    }

    public function getNextWorkSupplyAttribute()
    {
        return $this->level * 2;
    }

    public function getBuildingTypeAttribute()
    {
        $work = new Work();
        return $work->getType($this->building);
    }

    public function getCanBeUpgradedAttribute()
    {

        //($requirement->amount * $requirement->multiplier) * $building->level
        $requirements = $this->building->requirements;
        $errors = Auth::user()->afford_upgrade($requirements,$this);

        if (!empty($errors) && is_array($errors)) {
            return collect($errors);
        }

        return true;


    }

    public function requirements() {
        $building_requirements = $this->building->requirements;

        $requirements = [];

        foreach ($building_requirements as $requirement) {
            $required_amount = ($requirement->amount * $requirement->multiplier) * $this->level;
            $requirements[$requirement->supply->slug] = $required_amount;
        }

        return $requirements;
    }

    public function collectRequirements()
    {
        return collect($this->requirements());
    }


}
