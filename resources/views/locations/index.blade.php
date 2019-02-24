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
                                        <div class="card-body table-responsive">

                                                <table class="table table-striped table-responsive">

                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Level</th>
                                                        <th>-</th>
                                                        <th>-</th>
                                                        <th>-</th>
                                                    </tr>
                                            @foreach($location->users as $user)
                                                    @if ($user->id != \Illuminate\Support\Facades\Auth::user()->id)

                                                            <tr>
                                                                <td>
                                                                    {{ $user->avatar_name }}
                                                                </td>
                                                                <td>
                                                                    {{ $user->level }}
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-success" disabled="disabled">Message</button>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-secondary" disabled="disabled">Trade</button>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('user.attack', $user) }}">
                                                                        <button class="btn btn-danger">Attack</button>
                                                                    </a>
                                                                </td>
                                                            </tr>


                                                    @endif
                                            @endforeach
                                                </table>

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
