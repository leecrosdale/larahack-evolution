@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">YOU ARE DEAD</div>

                    <div class="card-body">
                        You were killed by (SOMEONE)! <br/><br/>

                        @if (\Illuminate\Support\Facades\Auth::user()->canHeal)
                            <div class="alert alert-success">But don't worry, your heal for today has been automatically used. <a href="{{ route('home') }}">Continue</a></div>

                            @php

                                $user = \Illuminate\Support\Facades\Auth::user();
                                $user->health = $user->max_health;
                                $user->last_heal = \Carbon\Carbon::now()->toDateTimeString();
                                $user->save();

                            @endphp

                        <br/>
                            <div class="alert alert-danger">Remember, if you die again today, you will have to wait for your 24 hour heal reset.</div>
                        @else
                            <div class="alert alert-danger">Your heal for today has already been used. Come back in {{ Auth::user()->last_heal->addDay()->diffForHumans() }}</div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
