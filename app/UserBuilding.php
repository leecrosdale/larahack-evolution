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

    protected $appends = ['next_work_time', 'next_work_supply', 'building_type','can_be_upgraded'];

    public function building() {
        return $this->belongsTo(Building::class);
    }


    public function getNextWorkTimeAttribute() {
            $difference = Carbon::now()->diffInSeconds($this->next_work, false);
            return Carbon::now()->addSeconds($difference)->diffForHumans();
    }

    public function getNextWorkSupplyAttribute() {
        return $this->level * 5;
    }

    public function getBuildingTypeAttribute() {
        $work = new Work();
        return $work->getType($this->building);
    }

    public function getCanBeUpgradedAttribute() {

        $supplies = [];

        foreach (Auth::user()->user_supplies as $supply) {
            $supplies[$supply->supply->slug] = $supply->amount;
        }

        $requirements = $this->building->requirements;

        $errors = [];

        foreach ($requirements as $requirement) {

            $required_amount = ($requirement->amount * $requirement->multiplier) * $this->level;

             if ($required_amount > $supplies[$requirement->supply->slug]) {
                $errors[$requirement->supply->slug] = $required_amount - $supplies[$requirement->supply->slug];
             }

        }

        if (!empty($errors)) {
            return collect($errors);
        }

        return true;


    }






}
