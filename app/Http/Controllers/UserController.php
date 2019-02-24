<?php

namespace App\Http\Controllers;

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
}
