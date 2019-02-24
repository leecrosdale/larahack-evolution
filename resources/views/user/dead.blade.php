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
                            But don't worry, your heal for today has been automatically used.
                            <a href="{{ route('home') }}">Continue</a>
                            <div class="alert alert-warning">REMEMBER IF YOU DIE AGAIN TODAY YOU WILL BE DEAD UNTIL YOUR LAST HEAL TIME (FROM NOW) IS 24 HOURS AGO</div>
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
