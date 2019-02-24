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


Route::group(['middleware' => ['web','auth', 'check.level', 'check.alive']], function () {

    Route::get('home', 'HomeController@index')->name('home');

    Route::resource('locations', 'LocationController');
    Route::get('locations/{location}/travel', 'LocationController@travel')->name('location.travel');

    Route::resource('training', 'TrainingController');


    Route::get('buildings/buy', 'UserBuildingController@buy')->name('user.building.buy');
    Route::get('buildings/{building}/buy', 'BuildingController@buy')->name('building.buy');

    Route::resource('buildings', 'UserBuildingController');

    Route::get('buildings/{building}/work', 'UserBuildingController@work')->name('user.building.work');
    Route::get('buildings/{building}/upgrade', 'UserBuildingController@upgrade')->name('user.building.upgrade');

    Route::resource('clans', 'ClanController');

    Route::get('user/sleep', 'UserController@sleep')->name('user.sleep');
    Route::get('user/heal', 'UserController@heal')->name('user.heal');
    Route::get('user/{user}/attack', 'UserController@attack')->name('user.attack');
    Route::get('train/{type}/{amount}', 'UserController@train')->name('user.train');

});

Route::group(['middleware' => ['web','auth']], function () {
    Route::get('user/dead', 'UserController@dead')->name('user.dead');
});
