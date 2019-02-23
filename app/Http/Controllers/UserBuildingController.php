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
        //
    }

    public function work(UserBuilding $building) {

        $work = new Work();
        $work->doWork($building, Auth::user());

        return back();
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
