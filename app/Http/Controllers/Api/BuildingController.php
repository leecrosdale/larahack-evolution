<?php

namespace App\Http\Controllers\Api;

use App\Building;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserBuildingResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserBuildingResource::collection(Auth::user()->buildings()->get());
    }


}
