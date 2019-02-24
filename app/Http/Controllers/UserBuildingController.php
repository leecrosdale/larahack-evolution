<?php

namespace App\Http\Controllers;

use App\Repository\Work;
use App\UserBuilding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Auth::user()->user_buildings()->with(['building','location'])->get();

        return view('buildings.index')->withBuildings($buildings);

    }

    public function work(UserBuilding $building) {

        $work = new Work();
        $work->doWork($building, Auth::user());

        return back();
    }

    public function upgrade(UserBuilding $building) {

        if ($building->can_be_upgraded) {

            // Remove Supply
            $requirements = $building->requirements();

            Auth::user()->remove_supplies($requirements);

            ++$building->level;
            $building->save();

        }

        return back();
    }

    public function buy() {

        $ages = \App\Age::where('order', '<=', Auth::user()->age->order)->get();
        $availableBuildings =  \App\Building::whereIn('age_id', $ages->pluck('id'))->whereNotIn('id', Auth::user()->user_buildings()->where('location_id',Auth::user()->location_id)->get()->pluck('building_id'))->get();

        return view('buildings.buy')->withBuildings($availableBuildings);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserBuilding  $userBuilding
     * @return \Illuminate\Http\Response
     */
    public function show(UserBuilding $userBuilding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserBuilding  $userBuilding
     * @return \Illuminate\Http\Response
     */
    public function edit(UserBuilding $userBuilding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserBuilding  $userBuilding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserBuilding $userBuilding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserBuilding  $userBuilding
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserBuilding $userBuilding)
    {
        //
    }
}
