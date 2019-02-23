<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserBuildingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();

        $buildings = $user->user_buildings()->with('building')->get();

        return view('home', compact(['user','buildings']));
    }
}
