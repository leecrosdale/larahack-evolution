<?php

namespace App\Http\Controllers;

use App\Enums\TrainingType;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function sleep() {

        $user = Auth::user();



        if ($user->last_sleep) {

            if (Carbon::now()->diffInDays($user->last_sleep) === 0) {
                return back()->with(['errors' => ['You can only sleep once every 24 hours - Last sleep was ' . $user->last_sleep->diffForHumans() ]]);
            }

        }


        if ($user->energy < 2) {
            $user->energy = $user->max_energy;
            $user->last_sleep = Carbon::now()->toDateTimeString();
            $user->save();
           return back()->with(['success' => ['You feel refreshed']]);
        }

        return back()->with(['errors' => ['You don\'t need to sleep right now']]);
    }

    public function heal() {

        $user = Auth::user();

        if ($user->last_heal) {

            if (Carbon::now()->diffInDays($user->last_heal) === 0) {
                return back()->with(['errors' => ['You can only heal once every 24 hours - Last heal was ' . $user->last_heal->diffForHumans() ]]);
            }

        }

        $user->health = $user->max_health;
        $user->last_heal = Carbon::now()->toDateTimeString();
        $user->save();

        return back()->with(['success' => ['You feel more healthy']]);

    }

    public function attack(User $user) {

        $defendingUser = $user;
        $attackingUser = Auth::user();

        if ($defendingUser->location_id != $attackingUser->location_id) {
            return back()->with(['errors' => [$defendingUser->avatar_name . ' is not in ' . $attackingUser->location->name . ' anymore!']]);
        }

        if ($defendingUser->health === 0) {
            return back()->with(['errors' => [$defendingUser->avatar_name . ' is dead!']]);
        }

        if (!$attackingUser->canAttack) {

            if ($attackingUser->energy < 7)  return back()->with(['errors' => ['You need at least 7 energy to attack!']]);

            return back()->with(['errors' => ['You can attack again in ' . $attackingUser->last_attack->addMinutes(5)->diffForHumans()]]);
        }

        // Damage Calc
        $damage = ($attackingUser->strength * $attackingUser->energy) - ($attackingUser->stamina * $defendingUser->energy);

        if ($damage < 0) {

            $damage_lost = ($damage/2) * -1;

            if ($damage_lost > $attackingUser->health) { $damage_lost = $attackingUser->health; }

            $attackingUser->energy -= 7;
            $attackingUser->health -= $damage_lost;
            $attackingUser->save();

            return back()->with(['errors' => ['You weren\'t strong enough to damage ' . $defendingUser->avatar_name . ' and lost ' . $damage_lost . ' health' ]]);
        }

        $message = 'Attacked ' . $defendingUser->avatar_name . ' for ' . $damage . ' damage';

        if ($damage > $defendingUser->health) {
            $message .= ', killing them!';
        } else {

            // Chance for defender to hit back
            if (random_int(0,100) > 98) {

                $damage_returned = ($defendingUser->strength * $defendingUser->energy) - ($attackingUser->stamina * $attackingUser->energy) / 2;
                $message .= 'but ' . $defendingUser->avatar_name . ' attacked back with ' . $damage_returned;


                if ($damage_returned < 0) {
                    $damage_returned = $attackingUser->health;
                }

                $attackingUser->health -= $damage_returned;

            }

        }

        if ($damage >  $defendingUser->health) {
            $damage = $defendingUser->health;
        }

        $defendingUser->health -= $damage;
        $defendingUser->save();



        $attackingUser->energy -= 7;
        $attackingUser->save();

        return back()->with(['success' => [$message]]);

    }


    public function train($type, $energy) {

        $user = Auth::user();

        if ($user->last_train) {
            if (Carbon::now()->diffInMinutes($user->last_train) <= 15) {
                return back()->with(['errors' => ['You can only train once every 15 minutes - Last train was ' . $user->last_train->diffForHumans() ]]);
            }
        }

        switch ($energy) {
            case TrainingType::ALL:
                $energy_amount = $user->energy;
            break;
            case TrainingType::HALF:
                $energy_amount = (int)$user->energy / 2;
            break;
            case TrainingType::QTR:
                $energy_amount = (int)$user->energy / 4;
            break;
        }

        $amount = (int) $energy_amount * random_int(1,4) / 2;

        $user->{$type} += $amount;

        switch($type) {

            case 'energy':
                $user->max_energy += $amount;
                break;
            case 'health':
                $user->max_health += $amount;
                break;

        }


        $user->energy -= $energy_amount;
        $user->last_train = Carbon::now()->toDateTimeString();
        $user->save();

        return back()->with(['success' => ['You trained ' . $type . ' for ' . $amount . ' levels']]);


    }

    public function dead() {
        return view('user.dead');
    }

}
