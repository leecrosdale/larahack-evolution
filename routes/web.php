<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => ['web']], function () {
    Route::get('home', 'HomeController@index')->name('home');

    Route::resource('locations', 'LocationController');
    Route::resource('buildings', 'BuildingController');

//    Route::get('buildings/{building}/work', 'UserBuildingController@work')->name('user.building.work');
    Route::get('buildings/{building}/upgrade', 'UserBuildingController@upgrade')->name('user.building.upgrade');

    Route::resource('clans', 'ClanController');

});
