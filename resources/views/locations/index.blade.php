@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Locations</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            @foreach ($locations as $location)
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header"> {{ $location->name }} -
                                            <a href="{{ route('location.travel', $location) }}">Travel</a>
                                                @php
                                                    $distance = $location->id  - \Illuminate\Support\Facades\Auth::user()->location_id;
                                                    $travel_cost = $distance < 0 ? $distance * -1 : $distance;
                                                @endphp

                                                ({{ $travel_cost }} Energy)
                                        </div>
                                        <div class="card-body">

                                            <ul>
                                            @foreach($location->users as $user)
                                                    @if ($user->id != \Illuminate\Support\Facades\Auth::user()->id)
                                                        <li>
                                                            {{ $user->avatar_name }} - Level {{ $user->level }}
                                                            <button class="btn btn-success">Message</button>
                                                            <button class="btn btn-secondary">Trade</button>
                                                            <button class="btn btn-danger">Attack</button>
                                                        </li>
                                                    @endif
                                            @endforeach
                                            </ul>

                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
