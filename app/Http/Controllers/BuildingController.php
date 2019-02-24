<?php

namespace App\Http\Controllers;

use App\Building;
use App\UserBuilding;
use App\Http\Resources\UserBuildingResource;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuildingController extends Controller
{

    public function buy(Building $building) {

        $supplies = $building->requirements_arr();

        $user_can_afford = Auth::user()->afford_purchase($supplies, $building);
        if ($user_can_afford === true) {

            Auth::user()->remove_supplies($supplies);

            $new_building = new UserBuilding();
            $new_building->building_id = $building->id;
            $new_building->location_id = Auth::user()->location_id;
            $new_building->level = 1;
            $new_building->health = 100;
            $new_building->max_health = 100;
            $new_building->next_work = Carbon::now()->toDateTimeString();
            $new_building->user_id = Auth::user()->id;
            $new_building->save();
            return redirect(url('/home'));

        }

        return back()->with(['errors' => $user_can_afford]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        //
    }
}
