<?php

namespace App\Http\Controllers\Auth;

use App\Age;
use App\Enums\SupplyType;
use App\Location;
use App\Supply;
use App\User;
use App\Http\Controllers\Controller;
use App\UserSupply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'avatar_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'starting_location' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'avatar_name' => $data['avatar_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'last_login' => Carbon::now()->toDateTimeString(),
            'location_id' => $data['starting_location'],
            'age_id' => Age::where('is_starting_age',true)->first()->id,
            'api_token' => str_random(100),
            'level' => 1
        ]);
    }

    public function showRegistrationForm()
    {
        $locations = Location::withCount('users')->get();
        return view('auth.register', compact('locations'));
    }

    protected function registered(Request $request, $user)
    {

        UserSupply::create([
            'user_id' => $user->id,
            'supply_id' => Supply::where('slug', SupplyType::WOOD)->first()->id,
            'amount' => 100
        ]);

        UserSupply::create([
            'user_id' => $user->id,
            'supply_id' => Supply::where('slug', SupplyType::FOOD)->first()->id,
            'amount' => 100
        ]);

        UserSupply::create([
            'user_id' => $user->id,
            'supply_id' => Supply::where('slug', SupplyType::STONE)->first()->id,
            'amount' => 100
        ]);

        UserSupply::create([
            'user_id' => $user->id,
            'supply_id' => Supply::where('slug', SupplyType::GOLD)->first()->id,
            'amount' => 0
        ]);




    }
}
